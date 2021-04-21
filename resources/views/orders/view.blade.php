@extends('layouts.app')
@section('title','Order Details')
@section('header','View Order Details')
@section('content')

@foreach ($orders as $order)
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-body">
                    <h4><strong>Order No : {{ $order->OrderID }}</strong></h4><br>
                    <h5 class="card-title "><strong >Order Details :</strong></h5>
                    <h6 style="text-align:left"><strong>
                            Due Date : {{$order->Due_date}}<br>
                            Created Date : {{ $order->Created_at }}<br><br>
                            Progress :  {{ $order->Progress }}<br>
                            Status :  {{ $order->Status }}<br><br>   
                    </strong></h6>          
                    <h5 class="card-title"><strong>Customer :</strong></h5>
                            <h6><strong> 
                                Name :{{ $order->CustomerName }}<br>
                                Address : {{ $order->Address }} <br>
                                Mobile No : {{ $order->MobileNo }} <br>
                                E-mail : {{ $order->Email }} <br><br>
                            </strong></h6>  
                        <h5 class="card-title"><strong>Order Items :</strong></h5>
                            <table class="table table-bordered">
                                    <tr>
                                        <th scope="col" >Description</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>  
                                    </tr>     
                                    @foreach($orders as $ord)
                                    <tr>
                                        <td >{{ $ord->ProductName }} </td>   
                                        <td>{{ $ord->Price }} </td>   
                                        <td>{{ $ord->Qty }} </td>   
                                        <td>{{ $ord->Price * $ord->Qty }} </td>        
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td colspan="2" style="text-align: left"><b>Discount</b></td>
                                        <td>{{ $ord->Discount}}  </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="2" style="text-align: left"><b>Advance Payment</b></td>
                                        <td>{{ $ord->Advance }}  </td>
                                    </tr>
                            </table>                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
@break 
@endforeach 
@endsection



     