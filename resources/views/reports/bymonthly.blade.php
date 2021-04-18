@extends('layouts.app')
@section('title','Sales Report')
@section('header','Monthly Sales Report')
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
                            <a class="dropdown-item" href="http://127.0.0.1:8000/byweekly">Weekly Sales Report</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/bydaily">Daily Sales Report</a>
                            <a class="dropdown-item" href="http://127.0.0.1:8000/salesreport">Other Sales Report</a>
                        </div>
                    </div>
                    <form action="{{ route('report') }}" method="get"><br><br>
                    <div class="container " style="background :none !important ">
                        <div class="row justify-content-center">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('report') }}" method="get"><br><br>  
                                        <a class="btn btn-primary" href="http://127.0.0.1:8000/premonth"> Compare </a><br><br>  
                                            <div class="row invoice-header px-3 py-4">
                                                <div class="col-12 text-center">
                                                    <h2 class="Name">ABS-CBN CORPORATION</h2>
                                                    <h6>No.95, Galle Road, Moratuwa</h6>
                                                    <h6>Tel : +(94) 112 605 731</h6>
                                                    <h6><a href="mailto:buyabc@abcgroup.com">email : buyabc@abcgroup.com</a></h6>
                                                    <hr>      
                                                    <h4 style="text-align: center; color:#233554">Monthly Sales Report </h4>
                                                    <h5 style="text-align: center; color:#233554">From :{{ $first_day_this_month }}  To : {{ $last_day_this_month }}  </h5>                      
                                                </div> 
                                            </div>
                                        <div>
                                    </div>
                                    <div class="table-responsive">
                                        <table>
                                            <tr> 
                                                <th>Order No</th>
                                                <th>Customer </th> 
                                                <th>Updated Date</th>
                                                <th>Product Name</th>                                             
                                            </tr>
                                            @foreach ($current_month as $order)
                                            <tr>
                                                <td>{{ $order->OrderID }}</td>
                                                <td>{{ $order->Customer }}</td>
                                                <td>{{ $order->updated_at }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($products as $item)                                         
                                                            @if ( $order->OrderID === $item->OrderID)
                                                                @foreach($item->products as $p)
                                                                    <li>{{ $p->Name }} (Rs.{{ $p->Price }})</li>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </td>                                            
                                            </tr>   
                                            @endforeach                                           
                                        </table>  
                                    </div>  
                                    <br><br><br>
                                    <div class="card" style="width: 18rem;">
                                        <ul class="list-group list-group-flush"><b>
                                            <li class="list-group-item">Date Range : <br> From {{ $first_day_this_month }}  To {{ $last_day_this_month }}</li>
                                            <li class="list-group-item">No of Sales : {{ $count }}</li>
                                        </b></ul>
                                    </div>
                                    <div align="right">
                                        <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Save</button></a>
                                        <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
                                    </div>
                                </div>
                        @endsection
