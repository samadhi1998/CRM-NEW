@extends('layouts.app')
@section('title','Orders')
@section('header','View Orders')
@section('content')

@if(Auth::user()->can('add-order', App\Models\Order::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/searchordercustomer"> Add new order <span data-feather="plus"></a></a>
</div>
@endif
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
<div class="table-responsive">
    <table>
        <tr> 
            <th>Order No</th>
            <!-- <th>Customer </th>
            <th>E-mail </th> -->
            <th>Date</th> 
            <th>Progress</th>
            <th>Order Items</th>
            <th width="280px">Action</th>
       </tr>
         @foreach ($orders as $order)
        <tr>
            <td>{{ $order->OrderID }}</td>
          
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->Progress }}</td>
            <td>
                <ul>
                    @foreach($order->products as $item)
                        <li>{{ $item->Name }} (Rs.{{ $item->Price }} x {{ $item->pivot->Qty }}  )</li>
                    @endforeach
                </ul>
            </td>

            <td>

            <div class="btn-group" role="group">

            @if(Auth::user()->can('show-Invoice-Quotation', App\Models\Order::class))
                <a href="{{ route('orders.show',$order->OrderID) }}" style="margin:2px" class="text-my-own-color"><span data-feather ="file-text"></span></a>
            @endif

            @if(Auth::user()->can('edit-order', App\Models\Order::class))
                <a href="{{ route('orders.edit',$order->OrderID) }}"  style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>
            @endif

            @if(Auth::user()->can('update-progress', App\Models\Order::class))
                <a href= "progressedit/{{$order->OrderID}}" class="text-my-own-color"><span data-feather="edit-3"> </span></a>
            @endif

            @if(Auth::user()->can('add-charge', App\Models\Charge::class))
            <a href= "addChargers/{{$order->OrderID}}" style="margin:2px" class="text-my-own-color"><span data-feather ="dollar-sign"></span></a> 
            @endif

            @if(Auth::user()->can('delete-order', App\Models\Order::class))
                <a href= "delete/{{$order->OrderID}}" class="text-my-own-color"><span data-feather="trash-2"> </span></a>
            @endif 

            @if(Auth::user()->can('add-task', App\Models\Task::class))
                <a href= "addtask/{{$order->OrderID}}" class="text-my-own-color"><span data-feather="target"> </span></a>
            @endif
            
            </div>

         
            </td>    
         </tr>   

         @endforeach

    </table>  
</div>
</div>
@endsection