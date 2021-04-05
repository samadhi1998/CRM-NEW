<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Order;
use App\Models\product;
use App\Models\customer;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Mail;

class OrdersController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Order::class, Order::class);
    }

    public function index()
    {
        $orders = Order::with('products')->get();
        return view('orders/index', compact('orders'));  
    }

    public function create()
    {   
        $products = Product::all();
        return view('orders/create', compact('products'));     
    }
    
    public function store(Request $request)
    {
       $order = Order::create($request->all());

        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);

        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {
                $order->products()->attach($products[$product], ['Qty' => $quantities[$product]]);
                
            }
        }
    
        return redirect()->route('orders.index');
    }

    public function show(Order $order)
    {
        //$orders = Order::all();
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.Created_at','orders.Advance','orders.Progress','orders.Discount',
                 'customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address',
                 'products.Name as ProductName','products.price','order_product.Qty','products.Price')
        ->where('orders.OrderID', '=', $order->OrderID)
        ->get();   
            
        return view('orders/show', compact('orders'));   
    }

    public function edit(Order $order)
    {
        $products = Product::all();

        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_product.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $order->OrderID)
        ->get();   

        return view('orders/edit', compact('products','orders')); 
    }

    public function update(Request $request, Order $order)
    {  
         $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_details.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $order->OrderID);
    
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

 
    public function delete($OrderID)
    {
        $order=Order::find($OrderID);
        $order->delete();
        return redirect('/orders');
    }


    public function joincustomers(Order $order)
    {
        // return DB::table('orders')->get();
           return DB::table('orders')
          ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
          ->select('customers.*')
          ->where('orders.CustomerID',1)
          ->get();   
    }

    public function jointasks(Order $order)
    {
        // return DB::table('orders')->get();
           return DB::table('orders')
          ->join('tasks','orders.TaskID',"=",'tasks.TaskID')
          ->select('tasks.*')
          ->where('orders.TaskID',1)
          ->get();   
    }


    public function joinorddetails(Order $order)
    {
        // return DB::table('orders')->get();
          return DB::table('order_details')
          ->join('orders','orders.OrderID',"=",'order_details.OrderID')
          ->join('products','products.ProductID',"=",'order_details.ProductID')
          ->select('order_details.Description','order_details.Qty','products.Price','orders.Discount','orders.Total_Price')
          ->where('orders.OrderID',1)
          ->get();   
    }

    public function emails()
    {
        $data["email"] = "aatmaninfotech@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";
  
        $pdf = PDF::loadView('emails.myTestMail', $data);
  
        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
  
        dd('Mail sent successfully');
    }

    public function selectorder(){
        $orders = Order::all();

        return view('task.selectorder',compact('orders'));
    }

    public function dashboard(){
        $orders = Order::all();

        return view('admin.dashboard',compact('orders'));
    }

    public function progressedit($OrderID)
    {
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_product.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $OrderID)
        ->first();   

        return view('orders.updateprogress',['orders'=>$orders]);
    }

    public function progressupdate(Request $request, Order $OrderID)
    {  
        $data = order::find($request->input('OrderID'));

        $orders =  DB::table('orders')

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_product.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $data->OrderID);
    
        $data->update($request->except(['_token']));
        return redirect()->route('orders.index');
    }
}