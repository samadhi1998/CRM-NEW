@extends('layouts.app')
@section('title','View Roles')
@section('header','View Roles')
@section('content')

@if(Auth::user()->can('add-role', App\Models\Role::class))
<div class="pull-left">
    <a class="btn btn-primary" href="/Create-Role">Add Role <span data-feather="plus"></a>
</div>
@endif
<br>
<br>
<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
        <br>
        <div class="table-responsive">
          <table>
            <tr>
              <th >@sortablelink('RoleID')</th>
              <th >@sortablelink('name')</th>
              <th >Action</th>
            </tr>
            @if($roles->count())
            @foreach($roles as $role)
            <tr>
              <td style="text-align: center">{{$role['RoleID']}}</td>
              <td style="text-align: left">{{$role['name']}}</td>
              <td>
              @if(Auth::user()->can('edit-role', App\Models\Role::class))
              <a href="roleedit/{{$role->RoleID}}" class="text-my-own-color" style="margin:2px" ><span data-feather="edit"></span></a>
              @endif
              @if(Auth::user()->can('delete-role', App\Models\User::class))
              <a href="" class="text-my-own-color" style="margin:2px" data-toggle="modal" data-target="#exampleModal2"><span data-feather="trash-2"></span></a>
              @endif
              </td>
            </tr>
            @endforeach
            @endif
          </table>
        </div>
          <br>
          <br>
          {!! $roles->appends(\Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Delete Alert</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body" style="color:#233554">
                You are going to delete the records of role id {{$role->RoleID}} . Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a href="/deleteRole/{{$role->RoleID}}"><button type="submit" form="myformproduct" class="btn btn-primary">Continue</button></a>
            </div>
        </div>
    </div>
</div>
@endsection