@extends('layouts.app')
@section('title','Notifications')
@section('header','View Notifications')
@section('content')
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
            <div class="table-responsive">
          <table>
            <tr>
              <th>Notification</th>
              <th>Read At</th>
              <th>Recieved At</th>
              <th>Delete</th>
            </tr>
            @foreach($notifications as $notification)
            <tr>
              <td style="text-align: left">{{$notification->data['name']}} registered into system using {{$notification->data['email']}}</td>
              <td>{{$notification['read_at']}}</td>
              <td>{{$notification['created_at']}}</td>
              <td>
                <a href="/deleteNotification/{{$notification->id}}" class="text-my-own-color"  onclick="return confirm('Are you sure you want to delete this item?');"><span data-feather="trash-2"></span></a>
              </td>
            </tr>
            @endforeach
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection