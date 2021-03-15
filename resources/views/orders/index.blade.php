@extends('layouts.app')
@section('title','Orders')
@section('header','Order Details')
@section('content')

<div class="pull-left">
    <a class="btn btn-primary" href="/addCustomer">Add new order</a>
</div>
<br>
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
            <th>NO:</th>
            <!-- <th>Customer </th> -->
            <th>Date</th>
            <th>Due Date</th>
            <th>Advance</th> 
            <th>Total Price </th> 
            <th>Progress</th> 
            <th>Action</th>         
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->OrderID }}</td>
            <!-- <td>{{ $order->CustomerID }}</td> -->
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->Due_date }}</td>
            <td>{{ $order->Advance }}</td>
            <td>{{ $order->Total_Price }}</td>
            <td>{{ $order->Progress }}</td>
            <td>


            <a href="{{ route('orders.show',$order->OrderID) }}"><span data-feather="eye"></span></a>
            <a href="{{ route('orders.edit',$order->OrderID) }}"><span data-feather="edit"></span></a>
            <div class="btn-group " role="group">
                <form action="{{route('orders.destroy', $order->OrderID)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" data-toggle="modal" data-target="#exampleModal2"><span data-feather="trash-2"></span></button>
                </form>
            </div>
                   

                    <!-- <a class="btn btn-primary" href="{{ route('orders.show',$order->OrderID) }}">Create</a> -->

                    <!-- <a class="btn btn-primary" href="{{ route('orders.edit',$order->OrderID) }}">Update</a> -->
            
                  

                </form>
            </td>    
        </tr>
        
        

        
        @endforeach
        </table>

        </div></div></div></div></div></div>
</div>
 




@endsection