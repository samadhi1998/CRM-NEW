@extends('layouts.app')
@section('title','Orders')
@section('content')
     
<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
<h2 style="text-align: center; color:#233554">Order Details</h2>
<hr style="background-color:#233554; height: 5px"><br>

<div class="pull-left">
    <a class="btn btn-primary" href="{{ route('orders.create') }}"> ADD </a>
</div>
<br><br>

<div>
    <table>
        <tr> 
            <th>NO:</th>
            <!-- <th>Customer </th> -->
            <th>Date</th>
            <th>Due Date</th>
            <th>Advance</th> 
            <th>Total Price </th> 
            <th>Progress</th> 
            <th width="280px">Action</th>         
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

            <div class="btn-group" role="group">
                <form action="{{route('orders.show', $order->OrderID)}}" method="POST">
                    <button type="submit" data-toggle="modal" >  <a href="{{ route('orders.show',$order->OrderID) }}">Create </a></button>
                </form>
            </div>

            <div class="btn-group" role="group">
                <form action="{{route('orders.edit', $order->OrderID)}}" method="POST">
                    <button type="submit" data-toggle="modal" >  <a href="{{ route('orders.edit',$order->OrderID) }}">Update </a></button>
                </form>
            </div>

            <div class="btn-group" role="group">
                <form action="{{route('orders.destroy', $order->OrderID)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" data-toggle="modal" data-target="#exampleModal2" >Delete</button>
                </form>
            </div>
                   

                    <!-- <a class="btn btn-primary" href="{{ route('orders.show',$order->OrderID) }}">Create</a> -->

                    <!-- <a class="btn btn-primary" href="{{ route('orders.edit',$order->OrderID) }}">Update</a> -->
            
                  

                </form>
            </td>    
        </tr>

        
        @endforeach

        
</div>
 




@endsection