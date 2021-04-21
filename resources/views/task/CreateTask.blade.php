@extends('layouts.app')
@section('title','Create Task')
@section('header','Create Tasks')
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <div class="card-body">
                <div class="container"  style="background :none !important ">
                    <form method="POST" action="{{ route('task.store') }}" id="myform">
                        @csrf
                        <label for="Description" ><b>Description : </b></label>
                        <textarea name="Description" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" rows="5" cols="50"></textarea>
                        <br>
                        <label for="Due_Date" ><b>Due Date : </b></label>
                        <input type="date" name="Due_Date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                        <br>
                        <label for="OrderID" ><b>Order ID : </b></label>
                        <input type="text" name="OrderID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$orders->OrderID}}"> 
                        <br>
                        <label for="ServicePersonID"><b>Assign Employee : </b></label>
                            <select name="ServicePersonID" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                                @foreach($users as $user)
                                    <option value="{{$user['EmpID']}}">{{$user['name']}}</option>
                                @endforeach
                            </select>
                        <br>
                        <label for="Status"><b>Status : </b></label>
                        <select name="Status" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                            <option value="Open">Open</option>
                            <option value="Completed">Completed</option>
                        </select>
                        <br>
                        <br>
                        <div class="btn-group float-right" role="group">
                        <button type="submit">Create Task</button>
                        </div>
                        <div class="btn-group float-right mr-2 " role="group">
                        <button type="submit" ><a href="/View-Task" class="text-my-own-color">Cancel</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
