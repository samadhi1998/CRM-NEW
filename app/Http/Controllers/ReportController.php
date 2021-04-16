<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\product;
use App\Models\customer;
use App\Models\order_detail;
use Carbon\Carbon;
use PDF;
use Mail;

class ReportController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Order::class, Order::class);
    }

    public function Reportindex()
    {   
       //return view('reports.select');
    }

    public function salesreport(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->toDateString();
        $end_date = Carbon::parse($request->end_date)->toDateString();

        $orders =  DB::table('orders')
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Progress', 'orders.Discount','orders.Total_Price')   
        
        ->where('orders.Status','=','Invoice') 
        ->whereBetween('orders.updated_at', [$request->First_date, $request->Last_date])
        ->where('orders.Status','=','Invoice')  
        ->get();

        $products =  Order::with('products')->latest()->get();
        return view('reports.SalesReport',compact('start_date','end_date','orders','products')); 
    }

    public function test() 
    {
        $catogory = Order::whereDate('orders.updated_at', Carbon::today());
        $catogory = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        $catogory = Order::whereMonth('orders.updated_at', date('m'))->whereYear('orders.updated_at', date('Y'))->get(['orders.updated_at','orders.OrderID']);
    
        return view('reports.test',compact('catogory'));    
    }
    
   public function bydaily(Request $request)
    {
        $count = Order::whereDate('created_at',Carbon::today())->where('orders.Status','=','Invoice')->count();

        $date = date('Y-m-d');
        $daily = Order::whereDate('orders.updated_at', Carbon::today())->oldest()

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Status', 'orders.Discount','orders.Total_Price')   
        ->where('orders.Status','=','Invoice')  
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);
       
        $products =  Order::with('products')->latest()->get();
        return view('reports.bydaily',compact('daily','count','date','products'));
    }

     
    public function byweekly(Request $request)
    {        
        $count = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('orders.Status','=','Invoice')->count();

        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d ');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d ');
        $current_week = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->oldest()

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Status', 'orders.Discount','orders.Total_Price')  
        ->where('orders.Status','=','Invoice')   
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);

        $products =  Order::with('products')->latest()->get();
        return view('reports.byweekly',compact('current_week','weekStartDate','weekEndDate','count','now','products'));
    }

    
  public function bymonthly(Request $request)
    {
        $count = Order::whereMonth('orders.updated_at', date('m'))
        ->whereYear('orders.updated_at', date('Y'))
        ->where('orders.Status','=','Invoice')  
        ->get(['orders.updated_at','orders.OrderID'])->count();

        $first_day_this_month = date('m-01-Y');
        $last_day_this_month  = date('m-t-Y');
        $current_month = Order::whereMonth('orders.updated_at', Carbon::now()->month)->oldest()
        
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Status', 'orders.Discount','orders.Total_Price')   
        ->where('orders.Status','=','Invoice')  
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);

        $products =  Order::with('products')->latest()->get();
        return view('reports.bymonthly',compact('current_month','count','first_day_this_month','last_day_this_month','products'));
    }

    public function premonth (Request $request)
    {
        $count = Order::whereMonth('orders.updated_at', '=', Carbon::now()->subMonth()->month)->where('orders.Status','=','Invoice') ->count();

        $start = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $end = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $premonth = Order::whereMonth('orders.updated_at', '=', Carbon::now()->subMonth()->month)->oldest()
         
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Status', 'orders.Discount','orders.Total_Price')   
        ->where('orders.Status','=','Invoice')  
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);
       
        $products =  Order::with('products')->latest()->get();
        return view('reports.premonth',compact('premonth','end','start','count','products'));
    }



/*
 
public function test() 
{


    $orders =  DB::table('orders')->oldest()
       
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_details','orders.OrderID',"=",'order_details.OrderID')
        ->join('products','products.ProductID',"=",'order_details.ProductID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Progress', 'orders.Discount','orders.Total_Price','products.Price','products.Name as ProductName','order_details.Qty')
        ->where('orders.Progress','=','Invoice')  
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer','products.Name as ProductName' ]);
       

    $count1 = Order::whereDate('created_at',Carbon::today())->count();

  
  
    $count2 = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

    return view('reports.test',compact('count1','count2','orders'));
}
*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
