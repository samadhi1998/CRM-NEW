@extends('layouts.app')
@section('title','Orders')
@section('header','View Orders')
@section('content')

@if(Auth::user()->can('add-order', App\Models\Order::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/searchordercustomer"> Add new order <span data-feather="plus"></a></a>
</div>
@endif

<br>
<br>
@if (Session::has('error'))
       <div class="alert alert-danger" role="alert">
           {{Session::get('error')}}
       </div>
  @endif
  @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
  @endif

<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">         
                    <form action="/SearchOrder" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" id="query" placeholder="Search Orders"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </form>
                    </br></br>
                    <div class="table-responsive">
                        <table>
                            <tr> 
                                <th width="80px">  @sortablelink('OrderID') </th>
                                <th width="80px">  Customer </th>
                                <th width="100px"> @sortablelink('created_at') </th> 
                                <th width="100px"> Progress </th>
                                <th width="50px">  Status </th>
                                <th width="370px"> Order Items </th>
                                <th width="200px"> Action </th>
                            </tr>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order['OrderID']}}</td>
                                <td style="text-align: left"> {{optional($order->customers)->Name}} </td>
                                <td style="text-align: left"> {{ $order['created_at'] }} </td>
                                <td style="text-align: left"> {{ $order['Progress'] }} </td>
                                <td style="text-align: left"> {{ $order['Status'] }} </td>
                                <td style="text-align: left">
                                    <ul>
                                        @foreach($order->products as $item)
                                            <li>{{ $item->Name }}(Rs.{{ $item->Price }} x {{ $item->pivot->Qty }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                    
                                <td>

                                <div class="btn-group" role="group">

                                <a href="/vieworddetails/{{$order['OrderID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>

                                @if(Auth::user()->can('edit-order', App\Models\Order::class))
                                    <a href="edit/{{$order->OrderID}}"  style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>
                                @endif
                                
                                @if(Auth::user()->can('update-progress', App\Models\Order::class))
                                    <a href= "progressedit/{{$order->OrderID}}" style="margin:2px" class="text-my-own-color"><span data-feather="edit-3"> </span></a>
                                @endif

                                @if(Auth::user()->can('show-Invoice-Quotation', App\Models\Order::class))
                                    <a href="{{ route('orders.show',$order->OrderID) }}" style="margin:2px" class="text-my-own-color"><span data-feather ="file-text"></span></a>
                                @endif

                                @if(Auth::user()->can('add-charge', App\Models\Charge::class))
                                <a href= "addChargers/{{$order->OrderID}}" style="margin:2px" class="text-my-own-color"><span data-feather ="dollar-sign"></span></a> 
                                @endif

                                @if(Auth::user()->can('delete-order', App\Models\Order::class))
                                <a href="/delete/{{$order->OrderID}}" class="text-my-own-color" style="margin:2px" onclick="return confirm('Are you sure you want to delete this item?');"><span data-feather="trash-2"></span></a>
                                @endif 

                                @if(Auth::user()->can('add-task', App\Models\Task::class))
                                    <a href= "addtask/{{$order->OrderID}}" class="text-my-own-color" style="margin:2px"><span data-feather="target"> </span></a>
                                @endif
                                
                                </div>

                                </td>    
                            </tr>   
                            @endforeach
                        </table> 
                        <br> 
                        {!! $orders->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection