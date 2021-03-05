@extends('layouts.app')

@section('content')
        <h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">View Order Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div>
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('orders.create') }}"> ADD </a>
                <a href="http://127.0.0.1:8000/" class="btn btn-success" role="button">Create Task</a>         
            </div>
        </div>
    <br>

    <form method="POST" action="/edit" id="myform">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr> 
                <th>NO:</th>
                <th> Customer </th>
                <th> Date </th>
                <th> Due Date </th>
                <th> Advance</th> 
                <th> Total Price </th> 
                <th> Progress</th> 
                <th width="280px">Action</th>         
            </tr>
          
            <tr>
                <td>No:</td>
                <td>{{ $order->CustomerID }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->Due_date }}</td>
                <td>{{ $order->Advance }}</td>
                <td>{{ $order->Total_Price }}</td>
                <td>{{ $order->Progress }}</td>
                <td>
                    <div class="btn-group float-right" role="group">
                        <button type="button" data-toggle="modal" data-target="#exampleModal" >Delete</button>
                    </div> 
                    <div class="btn-group float-right" role="group">
                        <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
                    </div>
                    <div class="btn-group float-right mr-2 " role="group">
                        <button type="submit" ><a href="orders.show" class="text-my-own-color">Create</a></button>
                    </div>


               <!-- <form action="{{ route('orders.destroy',$order->OrderID) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('orders.show',$order->OrderID) }}">Create</a>
                        <a class="btn btn-primary" href="{{ route('orders.edit',$order->OrderID) }}">Update</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button><br><br>
                </form>-->


                </td>    
            </tr>       
            @endforeach
        </table>

    </form>

        
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#233554">
                        You are going to update an Order. Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

@endsection