<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\order_detail;
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

    public function create(Request $request)
    {       
        $products = product::all();
        $customers = customer::find($request->input('CustomerID'));
        return view('orders/create', compact('products','customers'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'Status'=>'required',
            'Due_date'=>'required|after_or_equal:today'
        ]);
            
        $order = Order::create($request->all()); 
        $customers = $request->input('CustomerID'); 
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        
            for ($product=0; $product < count($products); $product++) 
            {           
                if ($products[$product] != '') 
                    {
                        if((product::find($products[$product])->Qty) >= $quantities[$product]){           
                            $order->products()->attach($products[$product], ['Qty' => $quantities[$product]]);                                         
                        }    
                        else{
                            $msg = " The requested quantity is not available !! ";
                            return back()->with('status',$msg);                       
                        }
                    }  
            }
        
        //product Thilini
        if ($request->input('Status') == 'Invoice') {
            for ($p = 0; $p < count($products); $p++) {
                $product = product::find($products[$p]);
                    $product->Qty = $product->Qty - $quantities[$p];
                    $product->save();
                }
            }

       return redirect('index')->with('success','Order Added');

    }

    public function edit($OrderID)
    {
        $data = Order::find($OrderID);

        $product = DB::table('products')
        ->join('order_product','products.ProductID',"=",'order_product.product_ProductID')
        ->select('products.ProductID','order_product.Qty','products.Price','products.Name')
        ->where('order_product.order_OrderID', '=', $data->OrderID)
        ->get(); 
        $products = product::all();
    
        return view('orders/edit',['order'=>$data,'products'=>$product]);  
    }

    public function update(Request $request, Order $order)
    {    
        $request->validate([
            'Due_date'=>'required|after_or_equal:today'
        ]);

        $data = Order::find($request->input('OrderID'));
        $data->OrderID = $request->input('OrderID');
        $data->Status=$request->input('Status');
        $data->Due_date=$request->input('Due_date');
        $data->Advance=$request->input('Advance');
        $data->Discount=$request->input('Discount');
        $data->CustomerID=$request->input('CustomerID');
        $data->save();

        $ProductID = $request->input('ProductID');
        $data->products()->attach($ProductID);

        $quantities = $request->input('quantities', []);

        if ($request->input('Status') == 'Invoice') {
         foreach (product::find($request->input('products',[])) as  $p => $product) {
             if(($product->Qty>0)&&(( $product->Qty - $quantities[$p])>=0)){
                 $product->Qty = $product->Qty - $quantities[$p];
                 $product->save();}      
         }
     
        }
         return redirect()->route('orders.index');
     }

 
    public function delete($OrderID)
    {
        $order=Order::find($OrderID);
        $order->delete();
        return redirect('/orders');
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

    public function emails($OrderID)
    {
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.created_at','orders.Advance','orders.Status','orders.Discount','customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address', 'products.Name as ProductName','products.price','order_product.Qty','products.Price')
        ->where('orders.OrderID', '=', $OrderID )
        ->get()->toArray(); 
  
        $pdf = PDF::loadView('orders.myEmail', compact('orders'));

        $orders["title"] = "From ABS-CBN CORPORATION";
        $orders["emails"] = "buyabc@abcgroup.com";
      
        Mail::send('emails.myTestMail', $orders, function($message)use($orders, $pdf) {
            $message->to($orders["emails"], $orders["emails"])
                    ->subject($orders["title"])
                    ->attachData($pdf->output(), "Invoice.pdf");
        });
  
        dd('Mail sent successfully');
        
    }

    public function PDF($OrderID)
    {
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.created_at','orders.Advance','orders.Status','orders.Discount','customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address', 'products.Name as ProductName','products.price','order_product.Qty','products.Price')
        ->where('orders.OrderID', '=', $OrderID )
        ->get()
        ->toArray(); 

        $pdf = PDF::loadView('orders.myPDF', compact('orders'));
        return $pdf->download('Invoice.pdf');
    }
    
    public function show(Order $order)
    {
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

        if($data->Progress == 'Order Completed'){
            return redirect()->back()->with('error', 'This order is already completed. You can not change the progress...');
        }elseif($data->Progress == 'Order Canceled'){
            return redirect()->back()->with('error', 'This order is canceled. You can not change the progress...');
        }
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

}