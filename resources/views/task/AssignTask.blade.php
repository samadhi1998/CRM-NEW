@extends('layouts.app')
@section('title','Orders')
@section('header','Assign Task')
@section('content')
<div class="container" style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">{{ __('View Employee Details') }}</div> -->

                <div class="card-body">

    <br>
    <form action="/Search_Products" method="GET" role="search">
      {{ csrf_field() }}
      <div class="input-group">
        <input type="text" class="form-control" name="query" id="query" placeholder="Search Employee"> <span class="input-group-btn">
        <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
      </div>
    </form>
  

    </br>
    </br>
  <table>
    <tr>
      <th>EmpID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>MobileNo</th>
      <th>Action</th>    
    </tr>
      @foreach($users as $user)
    <tr>
      <td>{{$user['EmpID']}}</td>
      <td>{{$user['name']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['Address']}}</td>
      <td>{{$user['MobileNo']}}</td>
      <td>
      <a href="" class="text-my-own-color" style="margin:2px"><span data-feather="check-circle"></span></a>
      <a href="/View-Task" class="text-my-own-color" style="margin:10px" ><span data-feather="x-circle"></span></a>
</td>
</tr>
@endforeach
</table>
</div></div></div></div></div></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Assign Task Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#233554">
                        You are going to assign a task to Employee {{$user['Name']}} with Employee ID {{$user['EmpID']}}. Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" table="mytabel" class="btn btn-primary">Continue</button>
                    </div>
                </div>
            </div>
        </div>
@endsection