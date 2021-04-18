@extends('layouts.app')
@section('title','View Notifications')
@section('header','View Notifications')
@section('content')

<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
            <div class="table-responsive">
          <table>
            <tr>
              <th >Notification</th>
              <th >Read At</th>
              <th >Recieved At</th>
            </tr>
            @foreach($notifications as $notification)
            <tr>
              <td style="text-align: left">{{$notification->data['name']}} registered into system using {{$notification->data['email']}}</td>
              <td>{{$notification['read_at']}}</td>
              <td>{{$notification['created_at']}}</td>
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