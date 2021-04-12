@extends('layouts.app')
@section('title','Chats')
@section('header','Chats')
@section('content')

<div class="container-fluid">
<div class="card">
  <div class="row">
    <div class="col-md-4">
      <div class="user-wrapper">
      <div class="card-header">Chats</div>
        <ul class="users">
        @foreach($users as $user)
          <li class="user" id="{{$user->EmpID}}">
          
            @if($user->unread)
            <span class="pending">{{ $user->unread }}</span>
           @endif  
            <div class="media">
              <div class="media-body">
                <div class="card text-center">
                <div class= "row no-gutters">
                <div class="col-md-4 align-self-center">
                <span data-feather="user" style="width: 50px; height: 50px" class="text-my-own-color" >
                </span>
                </div>
                <div class="col-md-8 ">
                <p class="name">{{$user->name}}</p>
                <p class="email">{{$user->email}}</p>
                </div>
                </div>
                </div>
              </div>
            </div>
          </li>
        @endforeach
        </ul>
      </div>
    </div>
    <div class="col-md-8" id="messages">
        
    </div>
  </div>
  </div>
</div>

@endsection