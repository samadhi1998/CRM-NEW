@extends('layouts.app')
@section('title','Create Task')
@section('content')
        <div class="container">
        <h2 style="text-align: center; color:#233554">Create New Task</h2>
        <br>
        <form method="POST" action="/edit" id="myform">
            @csrf
            <label for="Order ID" ><b>Order ID : </b></label>
            <input type="text" name="Order ID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
            <br>
            <label for="Task ID" ><b>Task ID : </b></label>
            <input type="text" name="Task ID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea name="Description" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" rows="5" cols="50"></textarea>
            <br>
            <label for="Due Date" ><b>Due Date : </b></label>
            <input type="date" name="Due Date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" data-target="#exampleModal" >Create Task</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" ><a href="/View-Progress" class="text-my-own-color">Cancel</a></button>
            </div>
            
        </form>
        </div>

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
                        You are going to create new task. Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary"><a href="/Assign-Task">Continue</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
