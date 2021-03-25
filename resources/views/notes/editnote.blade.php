@extends('layouts.app')
@section('title','Update Note')
@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Update Note') }}</div>
              <div class="card-body">
        <div class="container"  style="background :none !important ">
        <!-- @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
        <form method="POST" action="/UpdateNote"id="myformproduct" enctype="multipart/form-data" >
            @csrf
            <!-- <label for="AdminID" ><b>Admin ID : </b></label>
            <input type="text" name="AdminID" value="{{$data['AdminID']}}" name="Name" required readonly>
            <br> -->
             <label for="NoteID" ><b>Note ID: </b></label>
            <input type="text" name="NoteID" value="{{$data['NoteID']}}" name="Name" required readonly>
            <br> 
            <label for="Type"><b>Type : </b></label>
            <select  name="Type">
            <option value="{{$data['Type']}}" selected hidden>{{$data['Type']}}</option>
            <option value="Pre-Site-Visit">Pre-Site-Visit</option>
                <option value="Site-Visit">Site-Visit</option>
                <option value="None">None</option>
            </select>
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea name="Description" required rows="5" cols="50" >{{$data->Description}}</textarea>
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" class="btn btn-primary" ><a href="product/viewproduct">Cancel</a></button>
            </div>     
            </form>
        </div>
        </div></div></div></div>

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
                    You are going to update the details of note {{$data->NoteID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myformproduct" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>        

@endsection