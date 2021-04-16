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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF()
    {
       $orders = Order::all();
       
       $orders =  DB::table('orders')  

        ->join('customers','orders.CustomerID',"=",'customers.CustomerID')
        ->join('order_product','orders.OrderID',"=",'order_product.order_OrderID')
        ->join('products','products.ProductID',"=",'order_product.product_ProductID')
        ->select('orders.OrderID','orders.Due_date' ,'orders.created_at','orders.Advance','orders.Status','orders.Discount',
                 'customers.Name as CustomerName','customers.MobileNo', 'customers.Email','customers.Address',
                 'products.Name as ProductName','products.price','order_product.Qty','products.Price')->get();   

       $pdf = PDF::loadView('myPDF', compact('orders'));
       return $pdf->download('invoice.pdf');
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
