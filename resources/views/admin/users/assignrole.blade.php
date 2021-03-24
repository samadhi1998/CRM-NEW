@extends('layouts.app')
@section('title','Assign Role')
@section('header','Assign Role')
@section('content')

    
        <!-- @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
    
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <!-- <div class="card-header">{{ __('Add Product') }}</div> -->
              <div class="card-body">
        <div class="container"  style="background :none !important ">
        <form method="POST" action="/assignRole" id="myform" >
            @csrf
            <!-- <label for="AdminID"><b>Admin ID: </b></label>
            <input type="text" name="AdminID" required >
            <br> -->
            <label for="EmpID" ><b>Emp ID : </b></label>
            <input type="text" name="EmpID" value="{{$users->EmpID}}" required >
            <br>
            <label for="name" ><b>Emp Name : </b></label>
            <input type="text" name="name" value="{{$users->name}}" required >
            <br>
            
            <label for="RoleID"><b>Role : </b></label>
              <select  name="RoleID" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                @foreach($roles as $role) 
                  <option value="{{$role->RoleID}}">{{$role->name}}</option>
                @endforeach
              </select>
            
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Assign Role</button>
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
                        You are going to assign employee {{$users->name}} a role . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
            

@endsection