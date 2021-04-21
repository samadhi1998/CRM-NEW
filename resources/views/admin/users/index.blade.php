@extends('layouts.app')
@section('title','Users')
@section('header','Employee Details')
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
          <br>
          <!-- Search Bar -->
            <form action="/Search_Users" method="GET" role="search">
              {{ csrf_field() }}
                <div class="input-group">
                  <input type="text" class="form-control" name="query" id="query" placeholder="Search Employee"> 
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                      </span>
                </div>
            </form>
          <!-- Search Bar End -->
          </br>
          </br>
          <!-- Emp Detail Table -->
          <div class="table-responsive">
            <table>
              <tr>
                <th>@sortablelink('EmpID')</th>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('email')</th>
                <th>Address</th>
                <th>MobileNo</th>
                <th>Role</th>
                <th>Action</th>    
              </tr>
              @if($users->count())
              @foreach($users as $user)
              <tr>
                <td>{{$user['EmpID']}}</td>
                <td style="text-align: left">{{$user['name']}}</td>
                <td style="text-align: left">{{$user['email']}}</td>
                <td style="text-align: left">{{$user['Address']}}</td>
                <td>{{$user['MobileNo']}}</td>
                <td style="text-align: left">{{optional($user->roles)->name}}</td>
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
                  <a href="/deleteuser/{{$user->EmpID}}" style="margin:2px" class="text-my-own-color" onclick="return confirm('Are you sure you want to delete this item?');">
                  <span data-feather="trash-2"></span>
                  </a>
                  @endif
                </td> 
              </tr>
              @endforeach 
              @endif
            </table>
            </div>
          <!-- Emp Detail Table End -->
          <br>
          <br>
          {!! $users->appends(\Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


