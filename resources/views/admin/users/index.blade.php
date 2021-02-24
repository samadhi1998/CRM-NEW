@extends('layouts.app')
@section('title','Users')
@section('content')
     
    <div class="card">
      <div>
		    <img src="/img/logo.png" class="images">
	    </div>
      <div class="card-body">
        <h5 class="card-title">User Profile</h5>
        <p class="card-text">
        @foreach($users as $user)
        <!--<input type="hidden" class="find_value" value="{{$user->EmpID}}">-->
          {{$user['empid']}}
          <br>
          {{$user['name']}}
          <br>
          {{$user['email']}}
          <br>
        @endforeach  
        </p>
        <a href="#!" class="btn btn-primary">See more details</a>
      </div>
    </div>
  </div>



 




@endsection


