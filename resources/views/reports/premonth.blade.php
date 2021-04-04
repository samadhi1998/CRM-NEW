@extends('layouts.app')
@section('title','Sales Report')
@section('content')


<div class="container " style="background :none !important ">
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
        <div class="card-body">

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ---Select Report Cetogory---
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="http://127.0.0.1:8000/bydaily">Daily Sales Report</a>
                <a class="dropdown-item" href="http://127.0.0.1:8000/byweekly">Weekly Sales Report</a>
                <a class="dropdown-item" href="http://127.0.0.1:8000/bymonthly">Monthly Sales Report</a>
                <a class="dropdown-item" href="http://127.0.0.1:8000/salesreport">Other Sales Report</a>
            </div>
        </div>

    <!-- 
        <label><strong>Select category :</strong></label>
                <select id='OrderID' class="form-control" style="width: 200px">
                    <option value="">--Select Status--</option>
                    <option value="">Daily</option>
                    <option value="">Weekly</option>
                    <option value="">Monthly</option>
                </select> -->

<form action="{{ route('report') }}" method="get"><br><br>

<div class="container " style="background :none !important ">
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
        <div class="card-body">
        <form action="{{ route('report') }}" method="get"><br><br>   

    <div>
        <h2 style="text-align: center; color:#233554">ABC PVT(LTD)</h2>
        <h4 style="text-align: center; color:#233554">Monthly Sales Report </h4>
        <h5 style="text-align: center; color:#233554">From :{{ $start }}  To : {{ $end }}  </h5>
        <hr style="background-color:#233554; height: 3px">
    </div>
        </div>

            <table>
                <tr> 
                    <th>Order No</th>
                    <th>Customer </th> 
                    <th>Updated Date</th>
                    <th>Product Name</th>
                    <th>Qty</th> 
                    <th>Amount</th>
                </tr>
                    @foreach ($premonth as $order)
                <tr>
                    <td>{{ $order->OrderID }}</td>
                    <td>{{ $order->Customer }}</td>
                    <td>{{ $order->updated_at }}</td>
                    <td>{{ $order->ProductName }}</td>
                    <td>{{ $order->Qty }}</td>
                    <td>{{ ($order->Qty * $order->Price)-$order->Discount }}</td>    
                </tr>   

                    @endforeach
                    
            </table>  
          
            <br><br><br><br>
            <h5 class="font-light mb-0"><b>No of sales from {{ $start }}  to {{ $end }} : {{ $count }} </b> </h5>
        

          

            <div align="right">
                <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Save</button></a>
                <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
                <a class="btn btn-primary" href="http://127.0.0.1:8000/emails"> E-mail</a><br><br> 
             </div>

        </div>
@endsection
