@extends('layouts.app')
@section('title','Sales Report')
@section('header','Sales Report')
@section('content')


<div class="container " style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">             
                    <form>
                        <div class="row">
                            <div class="col-md-3" style="margin-top: 24px; margin-left: 30px">
                                <label for="">From: <input type="date" class="form-control" name="First_date"> </label>   
                            </div>
                            <div class="col-md-3" style="margin-top: 24px; margin-left: 30px">
                                <label for="">To:  <input type="date" class="form-control" name="Last_date"> </label>    
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-2" style="margin-top: 5px; margin-left: 30px">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                        </div>
                    </form>
                    <form action="{{ route('report') }}" method="get"><br><br>
                    <div class="container " style="background :none !important ">
                        <div class="row justify-content-center">
                            <div class="col-md">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('report') }}" method="get"><br><br>   
                                            <div>
                                                <h2 style="text-align: center; color:#233554">ABC PVT(LTD)</h2>
                                                <h4 style="text-align: center; color:#233554"> Sales Report </h4>
                                                <!-- <h5 style="text-align: center; color:#233554">From :{{ $start_date }}  To : {{ $end_date }}  </h5>  -->
                                                <hr style="background-color:#233554; height: 3px">
                                            <div>
                                        </div>
<!-- 
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">From: <input type="date" class="form-control" name="First_date"> </label>         
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                            <label for="">To:  <input type="date" class="form-control" name="Last_date"> </label>       
                    </div>
                </div>

                <div class="col-md-2" style="margin-top: 24px;">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
                <br><br> -->


            <div class="container " style="background :none !important ">
                <div class="row justify-content-center">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('report') }}" method="get"><br><br>   
                                    <div class="table-responsive">
                                        <table>
                                            <tr> 
                                                <th>Order No</th>
                                                <th>Customer </th> 
                                                <th>Updated Date</th>
                                                <th>Product Name</th>                                             
                                            </tr>
                                            @foreach ($orders as $order)
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
                            <br><br><br><br>
                            <div align="right">
                                <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Save</button></a>
                                <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
                            </div>

                        </div>
                @endsection
