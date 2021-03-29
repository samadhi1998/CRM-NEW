@extends('layouts.app')
@section('title','Users')
@section('header','Employee Details')
@section('content')
<div class="container" style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md-12">
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
      <!-- <th>Role</th> -->
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

        @if(Auth::user()->can('edit-user', App\Models\User::class))
        <a href="{{route('users.edit', $user->EmpID)}}" style="margin:2px" class="text-my-own-color">
        <span data-feather="edit"></span>
        </a>
        @endif

        @if(Auth::user()->can('assign-role', App\Models\User::class))
        <a href="assignRole/{{$user->EmpID}}" style="margin:2px" class="text-my-own-color">
        <span data-feather="key"></span>
        </a>
        @endif

        @if(Auth::user()->can('delete-user', App\Models\User::class))
        <form action="{{route('users.destroy', $user->EmpID)}}" method="POST" >
          @csrf
          <button type="submit" data-toggle="modal" data-target="#exampleModal2" style="margin:10px" class="text-my-own-color"><span data-feather="trash-2"></span></button>
          </form>
         @endif

      </td> 
    </tr>
    @endforeach 
 </table>
 </div></div></div></div></div></div></div>
@endsection


