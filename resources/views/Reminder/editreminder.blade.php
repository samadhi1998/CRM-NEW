@extends('layouts.app')
@section('title','Update Reminder')
@section('header','Update Reminder')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
      <b>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      <b>
    </div>
  @endif
  
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="container"  style="background :none !important ">
                    <form method="POST" action="/editeventurl"  id="myformproduct" enctype="multipart/form-data" >
                        @csrf
                        <label for="id" ><b>Reminder ID: </b></label>
                        <input type="text" name="id" value="{{$events['id']}}" required readonly>
                        <br>
                        <label for="title" ><b>Title : </b></label>
                        <input type="text" name="title" value="{{$events['title']}}" required>
                        <br>
                        <label for="start_date" ><b>Start Date : </b></label>
                        <input type="date" name="start_date" value="{{$events['start_date']}}" required>
                        <br>
                        <label for="end_date" ><b>End Date : </b></label>
                        <input type="date" name="end_date" value="{{$events['end_date']}}" required>
                        <br>
                        <label for="color" ><b>Color : </b></label>
                        <input type="color" name="color" value="{{$events['color']}}" required>
                        <br>
                        <br>
                        <div class="btn-group float-right" role="group">
                            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Update</button>
                        </div>
                        <div class="btn-group float-right mr-2 " role="group">
                            <button type="submit" class="btn btn-primary" ><a href="/reminder">Cancel</a></button>
                        </div>     
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                You are going to update the details of reminder {{$events->id}} . Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" form="myformproduct" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>        
@endsection