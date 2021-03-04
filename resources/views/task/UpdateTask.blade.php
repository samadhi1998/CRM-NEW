@extends('layouts.app')
@section('title','Update Task')
@section('content')
        <div class="container">
        <h2 style="text-align: center ;color:#233554">Update Task</h2>
        <br>
        <form method="POST" action="/edit" id="myform">
            @csrf
            <label for="TaskID" ><b>Task ID : </b></label>
            <input type="text" name="TaskID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$tasks->TaskID}}" readonly>
            <br>
            <label for="ServicePersonID" ><b>Service Person ID : </b></label>
            <input type="text" name="ServicePersonID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$tasks->ServicePersonID}}" readonly>
            <br>
            <label for="Due_Date" ><b>Due Date : </b></label>
            <input type="date" name="Due_Date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$tasks->Due_Date}}">
            <br>
            <label for="Status"><b>Status : </b></label>
            <select name="Status" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <option value="{{$tasks->Status}}" selected hidden>{{$tasks->Status}}</option>
                <option value="Active">Active</option>
                <option value="Completed">Completed</option>
                <option value="Canceled">Canceled</option>
            </select>
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea name="Description" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" rows="5" cols="50" >{{$tasks->Description}}</textarea>
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" ><a href="/View-Task" class="text-my-own-color">Cancel</a></button>
            </div>
            
        </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Update Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#233554">
                        You are going to update the details of Task ID {{$tasks->TaskID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
@endsection