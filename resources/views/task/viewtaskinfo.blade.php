@extends('layouts.app')
@section('title','Task Information')
@section('header','View Task Information')
@section('content')

@foreach ($tasks as $task)
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-body">
                    <h6 class="card-title "><strong >Task Details :</strong></h6>
                    <p style="text-align:left;color:#233556"><strong>
                        Task ID : {{ $task->TaskID }}<br>
                        Created Date : {{ $task->created_at }}<br><br> 
                    </strong></p>

                    <h6 class="card-title"><strong>Task Added By :</strong></h6>
                    <p style="text-align:left;color:#233556"><strong> 
                
                        Added By : {{ $task->EmpID }} <br>
                        Name :{{ $task->name }}<br>
                        Contact Number : {{ $task->MobileNo}} <br>
                        Email  : {{ $task->email}} <br>
                    </strong></p>  
                    <br>
                    <h6 class="card-title"><strong>Task Information :</strong></h6>
                    <br>
                    <table class="table table-bordered">
                        <tr>
                            <th scope="col">Task ID</th>
                            <th scope="col">Description</th>
                            <th scope="col"> Order ID</th>
                            <th scope="col">Customer ID </th>
                            <th scope="col"> Due Date</th> 
                            <th scope="col"> Status</th> 
                            <th scope="col"> Created Date</th> 
                        </tr>
            
                        <tr>                         
                            <td>{{ $task->TaskID }} </td>
                            <td>{{ $task->Description }} </td>   
                            <td>{{ $task-> OrderID }} </td>                       
                            <td>{{ $task->CustomerID }} </td>
                            <td>{{ $task->Due_Date }}</td>
                            <td>{{ $task->Status }}</td>        
                            <td>{{ $task->created_at }} </td>  
                        </tr>
                    </table> 
                    <br>
                    <div class="btn-group pull-right" role="group">
                    @if(Auth::user()->can('view-order-details', App\Models\Order::class))
                        <a href="/vieworddetails/{{$task->OrderID}}" style="margin:2px" class="text-my-own-color"><button><span data-feather ="eye"></span> View Order Details</button></a>
                    @endif
                    @if( $task->Status == 'Open' )
                        <a href="/completeTask/{{$task->TaskID}}" class="text-my-own-color"><button><span data-feather="check-circle"></span> Mark as Completed</button></a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endforeach 

@endsection