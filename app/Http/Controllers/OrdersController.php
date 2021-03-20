<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\order_detail;
use App\Models\product;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
    
        return view('orders/index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function create()
    {   
        return view('orders/create');
    }

   
    public function store(Request $request)
    {
       $request->validate([
            // 'OrderID' => 'required',
            'Due_date' => 'required',
            'Progress'=>'required',
            'Qty'=>'required',
            'Description'=>'required'

        ]);
    
        Order::create($request->all());
        // $order->CustomerCareID = Auth::user()->EmpID;
        order_detail::create($request->all());
     
        return redirect()->route('orders.index')
                        ->with('success','Order created successfully.');
    }
    
    public function show(Order $order)
    {
        return view('orders.show',compact('order'));
    }


    public function edit(Order $order)
    {
        return view('orders.edit',compact('order'));

        $order=order_detail::find($order_detailsID); 
        return view('find')->with('findorder',$order);
    }

    
    public function update(Request $request, Order $order)
    {  
        $order->update($request->all());
        $order_detail->update($request->all());
    
        return redirect()->route('orders.index')
                        ->with('success','Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
                        ->with('success','Order deleted successfully');
                                    
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
        $data = order::find($OrderID);
        return view('orders.updateprogress',['orders'=>$data]);
    }

    public function progressupdate(Request $request, Order $order)
    {
        $data = order::find($request->input('OrderID'));
        $data->OrderID = $request->input('OrderID');
        $data->CustomerID = $request->input('CustomerID');
        $data->Progress = $request->input('Progress');
        $data->Due_date = $request->input('Due_date');
        
        $data->save();

        return redirect('/index');
    }


}