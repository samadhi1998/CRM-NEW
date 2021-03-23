@extends('layouts.app')
@section('title','View Roles')
@section('header','View Roles')
@section('content')
<div class="pull-left">
    <a class="btn btn-primary" href="/Create-Role">Add Role <span data-feather="plus"></a>
</div>
<br>
<br>
<div class="container" style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">{{ __('View Product Details') }}</div> -->

                <div class="card-body">
        <br>
        <table>
          <tr>
            <th >Role ID</th>
            <th >Name</th>
            <!-- <th >Description</th> -->
            <th >Action</th>
            <!-- <th >Delete</th> -->
          </tr>
          
          @foreach($roles as $role)
          <tr>
            <td style="text-align: center">{{$role['RoleID']}}</td>
            <td style="text-align: center">{{$role['name']}}</td>
            <!-- <td style="text-align: center">{{$role['Description']}}</td> -->
            <td>
            <a href="roleedit/{{$role->RoleID}}" class="text-my-own-color" style="margin:2px" ><span data-feather="edit"></span></a>
            <a href= "viewpriviledge/{{$role->RoleID}}" style="margin:10px" class="text-my-own-color"><span data-feather ="settings"></span></a>
            </td>
          </tr>
          @endforeach
        </table>
        </div></div></div></div></div></div>
@endsection