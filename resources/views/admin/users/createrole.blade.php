@extends('layouts.app')
@section('title','Create Role')
@section('header','Create Role')
@section('content')

<div class="row justify-content-center">
  <div class="col-md">
    <div class="card">
      <div class="card-body">
        <div class="container"  style="background :none !important ">
          <form method="POST" action="{{ route('role.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="name" ><b>Role Name : </b></label>
            <input type="text" name="name" required >
            <br>
            <br>
            <div class="text-right">
              <button type="submit"  Value="Next"class="btn btn-primary">Add Role</button>	 			
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
            
@endsection