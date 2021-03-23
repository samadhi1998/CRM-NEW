@extends('layouts.app')
@section('title','Update Role')
@section('header','Update Role')
@section('content')
        <div class="container">
        <!-- <h2 style="text-align: center ;color:#233554">Update Task</h2> -->
        <br>
        <form method="POST" action="/roleedit" id="myform">
            @csrf
            <label for="RoleID" ><b>Role ID : </b></label>
            <input type="text" name="RoleID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$roles->RoleID}}" readonly>
            <br>
            <label for="name" ><b>name : </b></label>
            <input type="text" name="name" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$roles->name}}" >
            <br>
            <div class="form-group" >
            <label for="roles_permissions"> <b>Add Priviledges :</b>  </label>
            <div class="container">
            @foreach($priviledges as $priviledge)
            
                <div class="form-group form-check col-sm-5">
                <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}">
                <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                </div>
                  
            @endforeach  
            </div>
            </div>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" ><a href="/View-Role" class="text-my-own-color">Cancel</a></button>
            </div>
            
        </form>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Update Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#233554">
                        You are going to update the details of Role ID {{$roles->RoleID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
@endsection