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
        $orders =  DB::table('orders')
        
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('customers.Name','customers.MobileNo', 'customers.Email','orders.OrderID','orders.Due_date' ,
                 'orders.Created_at','orders.Advance','orders.Progress','orders.Total_Price','products.Price','order_details.Qty')
        ->get();
       
        return view('orders.index',['orders'=>$orders]);
    }

    
    public function create()
    {   
        return view('orders/create');
    }

    public function customerorder(Request $request, Order $model)
    {
        $existent = Order::where('CustomerID', $request->get('CustomerID'))->get();

        if($existent->count()) {
            return back();
        }

        $Order = $model->create($request->all());
        
        return redirect()
            ->route('/create', ['Order' => $Order->CustomerID]);
            
    }







    public function store(Request $request)
    {
        $request->validate([
            'Due_date' => 'required',
            'Progress'=>'required',
            'Qty'=>'required',
        ]);
    
        Order::create($request->all());
        order_detail::create($request->all());
      
        return redirect()->route('orders.index')
                        ->with('success','Order created successfully.');

                        DB::table('products')
                        ->where('ProductID', $content->ProductID)
                        ->update(['Qty' => DB::raw('Qty - '.$content->Qty)]);
    }
//     public function store(order_detail $order_detail)
//     {
       
    
//         Order::create($request->all());
//         $order_detail=order_detail::create($request->all());
//         foreach ($order_detail->products as $sold_product){
//         $product_ID = $sold_product->product->ProductID;
//         $product_Qty = $sold_product->product->Qty;
//         if($sold_product->Qty > $product_Qty) return back()->withError("The product '$product_ID' does not have enough stock. Only has $product_Qty units.");
//     }

//     foreach ($order_detail->products as $sold_product) {
//         $sold_product->product->Qty -= $sold_product->Qty;
//         $sold_product->product->save();
//     }

 
//     $order_detail->save();
 

//     return back()->withStatus('The sale has been successfully completed.');
// }
      
    
    public function show(Order $order)
    {
       $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.Created_at','orders.Advance','orders.Progress','orders.Discount',
                 'orders.Total_Price','customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address',
                 'products.Name as ProductName','products.price','order_details.Qty','products.Price')
        ->where('orders.OrderID', '=', $order->OrderID)
        ->get();   
             
          return view('orders.show',['orders'=>$orders]);
    }

    public function view(Order $order)
    {
        $orders =  DB::table('orders')  
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.Created_at','orders.Advance','orders.Discount','orders.Total_Price',
                 'customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address',
                 'products.Name as ProductName','order_details.Qty','products.Price')
        // ->where('orders.OrderID', '=', $order->OrderID)
        ->get();   
             
        return view('orders.view',['orders'=>$orders]);
    }



    public function edit(Order $order)
    {
        $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_details.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $order->OrderID)
        ->get();   

        return view('orders.edit',['orders'=>$orders]);
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

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
                        ->with('success','Order deleted successfully');                                    
    }

    
    public function delete($OrderID)
    {
        $order=Order::find($OrderID);
        $order->delete();
        return redirect('orders.index');
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
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_details.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $OrderID)
        ->first();   

        return view('orders.updateprogress',['orders'=>$orders]);
    }

    public function progressupdate(Request $request, Order $OrderID)
    {
        // $data = order::find($request->input('OrderID'));
        // $data->OrderID = $request->input('OrderID');
        // $data->CustomerID = $request->input('CustomerID');
        // $data->Progress = $request->input('Progress');
        // $data->Due_date = $request->input('Due_date');
        
        // $data->save();

        // return redirect('/index');
        $data = order::find($request->input('OrderID'));

        $orders =  DB::table('orders')

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.Due_date','orders.Advance','orders.Discount','orders.Progress','orders.Total_Price',
                 'products.Name as ProductName','order_details.Qty','products.Price','products.ProductID')
        ->where('orders.OrderID', '=', $data->OrderID);
    
        $data->update($request->except(['_token']));
        return redirect()->route('orders.index');
    }


}