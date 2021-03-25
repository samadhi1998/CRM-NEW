@extends('layouts.app')
@section('title','View Orders')
@section('content')

    @foreach ($orders as $order)

    <div class="container" style="background :none !important ">
    <div class="row justify-content-center">
    <div class="col-md">
        <!-- <form action="{{ route('orders.store') }}" method="POST"> -->

        <div class="card" >
            <div class="card-body">
            
            <h5><strong>Order No : {{ $order->OrderID }}</strong></h5><br>

                <h6 class="card-title"><strong>Order Details :</strong></h6>
                    <p><strong>
                        Due Date : {{$order->Due_date}}<br>
                        Created Date : {{ $order->Created_at }}<br><br> 
                    </strong></p>

                <h6 class="card-title"><strong>Customer :</strong></h6>
                    <p><strong> 
                        Name :{{ $order->CustomerName }}<br>
                        Address : {{ $order->Address }} <br>
                        Mobile No : {{ $order->MobileNo }} <br>
                        E-mail : {{ $order->Email }} <br><br>
                    </strong></p>  

                <h6 class="card-title"><strong>Order Items :</strong></h6>
                    <table class="table table-bordered">
                            <tr>
                                <th scope="col">Description</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Total</th> 
                            </tr>
      
                            <tr>                         
                                <td>{{ $order->ProductName }} </td>
                                <td>{{ $order->Price }} </td>   
                                <td>{{ $order->Qty }} </td>                       
                                <td>{{ $order->Discount }} </td>
                                <td>{{ $order->Price * $order->Qty }}</td>                         
                            </tr>
                            <tr>
                                <td>  </td>
                                <td colspan="2">Advance Payment</td>
                                <td>  </td>
                                <td>{{ $order->Advance }}  </td>
                            </tr>
                   </table> 
            </div>
        </div>
        <!-- </form> -->
    </div> 

@endforeach 
@endsection