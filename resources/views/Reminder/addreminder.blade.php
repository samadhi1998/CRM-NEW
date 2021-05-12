@extends('layouts.app')
@section('title','Reminders')
@section('header','Calendar')
@section('content')
<div class="pull-left">
    @if(Auth::user()->can('add-reminder', App\Models\Event::class))    
      <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary" >Add New Reminder</button>
    @endif
    @if(Auth::user()->can('view-reminder', App\Models\Event::class))
      <a class="btn btn-primary" href="/view-reminder">View Reminders </a>
    @endif
</div>
<br>
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
          {!! $calendar->calendar() !!}
          {!! $calendar->script() !!}
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
        <form method="POST" action="{{ route('addevent.store') }}"  id="myform">
                @csrf
                <label for="title" ><b>Add Title : </b></label>
                <input type="text" name="title" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="color" ><b>Add Color : </b></label>
                <input type="color" name="color" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="start_date" ><b>Start Date : </b></label>
                <input type="date" name="start_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
                <br>
                <label for="end_date" ><b>End Date : </b></label>
                <input type="date" name="end_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">
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