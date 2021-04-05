@extends('layouts.app')
@section('title','Search User')
@section('header','Search User')
@section('content')
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
        <div class="table-responsive">
        <table>
          <tr>
            <th>EmpID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>MobileNo</th>
            <th>Role</th>
            <th>Action</th>    
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{{$user['EmpID']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['Address']}}</td>
            <td>{{$user['MobileNo']}}</td>
            <td>{{optional($user->roles)->name}}</td>
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
                  <a href="/deleteuser/{{$user->EmpID}}" style="margin:2px" class="text-my-own-color">
                  <span data-feather="trash-2"></span>
                  </a>
                  @endif
                </td> 
          <tr>
          @endforeach
        </table>
        </div>
          </br>
          </br>

          {{$users->links()}}
          <div class="pull-right" style="text-align: right;color:blue">
            <a href="{{ URL::previous() }}">Go Back</a>
          </div>
          </br>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection