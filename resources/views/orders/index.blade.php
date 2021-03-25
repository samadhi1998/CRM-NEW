@extends('layouts.app')
@section('title','Orders')
@section('content')

<div class="pull-left">
    <a class="btn btn-primary" href="/addCustomer"> Add new order <span data-feather="plus"></a></a>
</div>
<br><br>

<div class="container " style="background :none !important ">
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
        <div class="card-body">
            <form action="" method="GET" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="query" id="query" placeholder="Search Orders"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </form>
</br></br>
    
<div>
    <table>
        <tr> 
            <th>Order No</th>
            <th>Customer </th> 
            <th>MobileNo </th> 
            <th>E-mail </th>
            <th>Date</th>
            <th>Due Date</th>
            <th>Advance</th> 
            <th>Amount</th>
            <th>Progress</th>
            <th width="280px">Action</th>
       </tr>
         @foreach ($orders as $order)
        <tr>
            <td>{{$order->OrderID }}</td>
            <td>{{ $order->Name }}</td>
            <td>{{ $order->MobileNo }}</td>
            <td>{{ $order->Email }}</td>
            <td>{{ $order->Created_at }}</td>
            <td>{{ $order->Due_date }}</td>
            <td>{{ $order->Advance }}</td>
            <td>{{ $order->Qty * $order->Price }}</td>
            <td>{{ $order->Progress }}</td>
            <td>
            
            <div class="btn-group" role="group">
                <a href="http://127.0.0.1:8000/view"  style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
            </div>

            <div class="btn-group" role="group">
                <a href="{{ route('orders.show',$order->OrderID) }}" style="margin:2px" class="text-my-own-color"><span data-feather ="file-text"></span></a>
            </div>

            <div class="btn-group" role="group">
                <a href="{{ route('orders.edit',$order->OrderID) }}"  style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>
            </div>

            <div>
                <a href= "progressedit/{{$order->OrderID}}" class="text-my-own-color"><span data-feather="edit-3"> </span></a>
            </div>

            <div class="btn-group" role="group">
                <form action="{{route('orders.destroy', $order->OrderID)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" data-toggle="modal" a href= "{{route('orders.destroy', $order->OrderID)}}" style="margin:10px" class="text-my-own-color"><span data-feather ="trash-2"></span></a>
                </form>
            </div> 
            
            </td>    
         </tr>   

         @endforeach

    </table>  
</div>
@endsection