@extends('layouts.app')
@section('title','Users')
@section('header','Employee Details')
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
        <div class="btn-group" role="group">
        <a href="{{route('users.edit', $user->EmpID)}}">
          <button type="button" >Edit</button>
        </a>
        </div>

        <div class="btn-group" role="group">
        <form action="{{route('users.destroy', $user->EmpID)}}" method="POST">
          @csrf
          @method('delete')
          <button type="submit" data-toggle="modal" data-target="#exampleModal2" >Delete</button>
          </form>
        </div>
      </td> 
    </tr>
    @endforeach 
 </table>
 </div></div></div></div></div></div></div>

    <!-- <div class="btn-group" role="group">
    <button type="button" data-toggle="modal" data-target="#exampleModal1" >Delete</button>
                </div> -->
      


 




@endsection


