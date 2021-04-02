@extends('layouts.app')
@section('title','Add priviledge')
@section('header','Add priviledge')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <!-- <div class="card-header">
                    Assign Priviledges
                </div> -->
                <div class="card-body">
                <form method="POST" action="/viewpriviledge" id="myform">
                        @csrf
                        @method('PUT')
                        <label for="Role"><b>Role : </b></label>
                        <select  name="Role" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                            <option value="{{$roles->RoleID}}">{{$roles->name}}</option>
                        </select>
                    <br>
                    <br>
                 
                    @foreach($priviledges as $priviledge)
                        
                            <div class="form-group form-check col-sm-5">
                            <input type="checkbox" value="" class="form-check-input"  name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}">
                            <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                            </div>
                        
                    @endforeach
                 
                       
                        <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" data-target="#exampleModal" >Submit</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" ><a href="/admin/users/index" class="text-my-own-color">Cancel</a></button>
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
                        You are going to add priviledges to {{$roles->name}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Continue</button>
                    </div>
                </div>
            </div>
        </div>

                 </div>
            </div>
        </div>
@endsection