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

  
class PDFController extends Controller
{
    
    public function PDFDaily()
    {
        $date = date('Y-m-d');

        $daily = Order::whereDate('orders.updated_at', Carbon::today())->oldest()
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.*','customers.Name as Customer')   
        ->where('orders.Status','=','Invoice')  
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);

        $countInvo = Order::whereDate('created_at',Carbon::today())->where('orders.Status','=','Invoice')->count();
        $countQuo = Order::whereDate('created_at',Carbon::today())->where('orders.Status','=','Estimated Quotation')->count();

        $products =  Order::with('products')->latest()->get();

        $pdf = PDF::loadView('reports.test',compact('daily','date','products','countInvo','countQuo')); 
        return $pdf->download('Daily Sales Report.pdf');  
        
    }

    public function PDFWeekly()
    {
        $countInvo = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('orders.Status','=','Invoice')->count();
        $countQuo = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('orders.Status','=','Estimated Quotation')->count();

        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d ');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d ');

        $current_week = Order::whereBetween('orders.updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->oldest()
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Status', 'orders.Discount','orders.Total_Price')  
        ->where('orders.Status','=','Invoice')   
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);

        $products =  Order::with('products')->latest()->get();
  
        $pdf = PDF::loadView('reports.test2',compact('current_week','weekStartDate','weekEndDate','countInvo','countQuo','now','products')); 
        return $pdf->download('Weekly Sales Report.pdf');  
    
    }


    public function PDFMonthly()
    {
        $countInvo = Order::whereMonth('orders.updated_at', date('m'))->whereYear('orders.updated_at', date('Y'))
        ->where('orders.Status','=','Invoice') ->get(['orders.updated_at','orders.OrderID'])->count();

        $countQuo = Order::whereMonth('orders.updated_at', date('m'))->whereYear('orders.updated_at', date('Y'))
        ->where('orders.Status','=','Estimated Quotation')->get(['orders.updated_at','orders.OrderID'])->count();

        $first_day_this_month = date('m-01-Y');
        $last_day_this_month  = date('m-t-Y');
        $current_month = Order::whereMonth('orders.updated_at', Carbon::now()->month)->oldest()
        
        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->select('orders.OrderID','orders.updated_at','customers.Name as Customer','orders.created_at','orders.Due_date','orders.Advance','orders.Status', 'orders.Discount','orders.Total_Price')   
        ->where('orders.Status','=','Invoice')  
        ->get(['orders.OrderID','orders.updated_at','customers.Name as Customer']);

        $products =  Order::with('products')->latest()->get();

        $pdf = PDF::loadView('reports.test3',compact('current_month','countInvo','countQuo','first_day_this_month','last_day_this_month','products')); 
        return $pdf->download('Monthly Sales Report.pdf');  
        
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function show(PDF $pDF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function edit(PDF $pDF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PDF $pDF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PDF  $pDF
     * @return \Illuminate\Http\Response
     */
    public function destroy(PDF $pDF)
    {
        //
    }
}
