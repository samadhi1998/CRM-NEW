@extends('layouts.app')
@section('title','Reminders')
@section('header','Calendar')
@section('content')
<div class="pull-left">
    <button type="button" data-toggle="modal" data-target="#exampleModal" >Add New Reminder</button>
</div>
<br>
<br>
<br>
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <div id='calendar'></div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/addreminder" id="myform">
                @csrf
                <label for="Description" ><b>Description : </b></label>
                <textarea name="Description" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" rows="5" cols="50" ></textarea>
                <br>
                <label for="StartDate" ><b>Start Date : </b></label>
                <input type="date" name="StartDate" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="EndDate" ><b>End Date : </b></label>
                <input type="date" name="EndDate" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="myform">Add</button>
      </div>
    </div>
  </div>
</div>

@endsection