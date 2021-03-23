@extends('layouts.app')
@section('title','Create Role')
@section('header','Create Role')
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
        <form method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- <label for="AdminID"><b>Admin ID: </b></label>
            <input type="text" name="AdminID" required >
            <br> -->
            <label for="name" ><b>Role Name : </b></label>
            <input type="text" name="name" required >
            <br>
            <br>
            <div class="text-right">
             <button type="submit"  Value="Next"class="btn btn-primary">Add Role</button>	 			
              </div>
            </form>
            </div>
            </div></div></div></div>
            

@endsection