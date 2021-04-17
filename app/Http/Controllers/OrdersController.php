<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\order_detail;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\Order;
use Carbon\Carbon;
use PDF;
use Mail;

class OrdersController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Order::class, Order::class);
    }

    public function index(Request $request)
    {   
        $orders = Order::sortable()->paginate(5);
        return view('orders/index')->with('orders', $orders)
        ->with('customers',customer::all());
    }

    public function create(Request $request, customer $CustomerID)
    {       
       $products = Product::all();
       $customers = customer::all();
       // $customers = customer::find($CustomerID);
       
        return view('orders/create', compact('products','customers'));    
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'Status'=>'required',
            'Due_date'=>'required'
        ]);
            
        $order = Order::create($request->all());
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product], ['Qty' => $quantities[$product]]);          
            }        
        }

        //product Thilini
        if ($request->input('Progress') == 'Invoice') {
            for ($p = 0; $p < count($products); $p++) {
                $product = product::find($products[$p]);
                if(($product->Qty>0)&&(( $product->Qty - $quantities[$p])>=0)){
                    $product->Qty = $product->Qty - $quantities[$p];
                    $product->save();
                }else{
                   // dd("error");               
                   redirect()->back()->with(["error"=> $product->Name.
                   " is not having enough  Quantity availble. only have  ". $product->Qty." Quantity."]);
                }
                
            }
        }   
       // return redirect()->route('orders.index');
       return redirect('index')->with('success','Order Added');

    }


    public function show(Order $order)
    {
        //$orders = Order::all();
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.Created_at','orders.Advance','orders.Status','orders.Discount',
                 'customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address',
                 'products.Name as ProductName','products.price','order_product.Qty','products.Price')
        ->where('orders.OrderID', '=', $order->OrderID)
        ->get();   
        
        return view('orders/show', compact('orders'));   
    }

    public function vieworddetails($OrderID)
    {
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.Created_at','orders.Advance','orders.Progress','orders.Status','orders.Discount',
                 'customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address',
                 'products.Name as ProductName','products.price','order_product.Qty','products.Price')
        ->where('orders.OrderID', '=', $OrderID )
        ->get()->toArray();  
        return view('orders.view',['orders'=>$orders]);
    }

    public function edit($OrderID)
    {
        $data = Order::find($OrderID);

        $product = DB::table('products')
        ->join('order_product','products.ProductID',"=",'order_product.product_ProductID')
        ->select('products.Name as ProductName','order_product.Qty','products.Price')
        ->where('order_product.order_OrderID', '=', $data->OrderID)
        ->get(); 
    
        return view('orders/edit',['order'=>$data,'products'=>$product]);  
    }

    public function update(Request $request, Order $order)
    {    
        $data = Order::find($request->input('OrderID'));
        $data->OrderID = $request->input('OrderID');
        $data->Status=$request->input('Status');
        $data->Due_date=$request->input('Due_date');
        $data->Advance=$request->input('Advance');
        $data->Discount=$request->input('Discount');
        $data->CustomerID=$request->input('CustomerID');
        $data->save();


        $ProductID = $request->input('ProductID');
        $orders->products()->attach($ProductID);
  


        return redirect('/index');
    }

    public function delete($OrderID)
    {
        $order=Order::find($OrderID);
        $order->delete();
        return redirect('/orders');
    }

    public function emails()
    {
        $data["email"] = "buyabc@abcgroup.com";
        $data["title"] = "From buyabc@abcgroup.com";
        $data["body"] = "This is Demo";
  
        $pdf = PDF::loadView('emails.myTestMail', $data);
  
        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
  
        dd('Mail sent successfully');
    }

    public function selectorder()
    {
        $orders = Order::all();

        return view('task.selectorder',compact('orders'));
    }

    public function dashboard()
    {
        $orders = Order::all();

        return view('admin.dashboard',compact('orders'));
    }

    public function progressedit($OrderID)
    {
        $data = order::find($OrderID);
        return view('orders.updateprogress',['orders'=>$data]);
    }

    public function progressupdate(Request $request, Order $order)
    {
        $data = order::find($request->input('OrderID'));
        $data->OrderID = $request->input('OrderID');
        $data->Progress = $request->input('Progress');
        
        $data->save();

        return redirect('/index');
    }

    public function SearchOrder(Request $request)
    {

        $request->validate([
            'query'=>'required']);

        $query=$request->input('query') ;
        
        $order=Order::where('OrderID', 'like', "%$query%")->paginate(5);
        
        if (count($order)>0) {
            return view('orders/searchorder', ['orders'=>$order]);
        } else {
            return redirect()->back()->with('error', 'Invalid Search , Enter available one ...');
        }
    
    }


}