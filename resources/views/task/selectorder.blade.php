@extends('layouts.app')
@section('title','Orders')
@section('header','Select Order')
@section('content')

<!-- <div class="pull-left">
    <a class="btn btn-primary" href="/addCustomer">Add new order <span data-feather="plus"></a>
</div>
<br> -->
<br>
<div class="container" style="background :none !important ">
<div class="row">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">{{ __('View Order Details') }}</div> -->
                <div class="card-body">

<div>
<form action="/Search_Order" method="GET" role="search">
{{ csrf_field() }}
<div class="input-group">
<input type="text" class="form-control" name="query" id="query"
 placeholder="Search Order"> <span class="input-group-btn">
<button type="submit" class="btn btn-default">
 <span class="glyphicon glyphicon-search"></span>
  </button>
  </span>
  </div>
</form>
<br>
<br>

    <table>
        <tr> 
            <th>Order ID:</th>
            <!-- <th>Customer </th> -->
            <th>Created Date</th>
            <th>Due Date</th>
            <th>Progress</th> 
            <th>Action</th>         
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->OrderID }}</td>
            <!-- <td>{{ $order->CustomerID }}</td> -->
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->Due_date }}</td>
            <td>{{ $order->Progress }}</td>
            <td>


            <a href="/addtask/{{$order['OrderID']}}" class="text-my-own-color" style="margin:2px"><span data-feather="check-circle"></span></a>
            <a href="/View-Task" class="text-my-own-color" style="margin:10px" ><span data-feather="x-circle"></span></a>

            </td>    
        </tr>
        
        
        @endforeach
        </table>

        </div></div></div></div></div></div>
</div>
 




@endsection