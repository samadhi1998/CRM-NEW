@extends('layouts.app')
@section('title','Search Order')
@section('header','Search Order')
@section('content')
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
         <table>
            <tr> 
                <th width="80px"> OrderID</th>
                <th width="80px"> Customer</th>
                <th width="100px">created_at</th> 
                <th width="100px">Progress</th>
                <th width="50px"> Status </th>
                <th width="370px">Order Items</th>
                <th width="200px">Action</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order['OrderID']}}</td>
                <td style="text-align: left">{{optional($order->customers)->Name}}</td>
                <td style="text-align: left">{{$order['created_at']}}</td>
                <td style="text-align: left"> {{ $order['Progress'] }} </td>
                <td style="text-align: left">{{$order['Status']}}</td>
                <td style="text-align: left">
                    <ul>
                        @foreach($order->products as $item)
                            <li>{{ $item->Name }}(Rs.{{ $item->Price }} x {{ $item->pivot->Qty }})</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                
                <a href="/vieworddetails/{{$order['OrderID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>

                @if(Auth::user()->can('show-Invoice-Quotation', App\Models\Order::class))
                    <a href="{{ route('orders.show',$order->OrderID) }}" style="margin:2px" class="text-my-own-color"><span data-feather ="file-text"></span></a>
                @endif

                @if(Auth::user()->can('edit-order', App\Models\Order::class))
                    <a href="edit/{{$order->OrderID}}"  style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>
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

                </td>
            </tr>
            @endforeach
          </table>
          </br></br>
          {{$orders->links()}}
          <div class="pull-right" style="text-align: right;color:blue">
            <a href="{{ URL::previous() }}">Go Back</a>
          </div>
          </br>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection