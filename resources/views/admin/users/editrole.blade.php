@extends('layouts.app')
@section('title','Update Role')
@section('header','Update Role')
@section('content')
<div class="container">
    <br>
        <form method="POST" action="/roleedit" id="myform">
            @csrf
            <label for="RoleID" ><b>Role ID : </b></label>
            <input type="text" name="RoleID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$roles->RoleID}}" readonly>
            <br>
            <label for="name" ><b>Role name : </b></label>
            <input type="text" name="name" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$roles->name}}" readonly >
            <br>
                <div class="form-group" >
                    <label for="roles_permissions"> <b>Add Priviledges :</b>  </label>
                        <div class="container">
                            <!--Row One Start-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">User Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [1,2,3]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Customer Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [39,40,41,42]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Role Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [4,35,36,37,43]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <!--Row One End-->
                            <br>
                            <!--Row Two Start-->
                            <div class=row>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h6 class="card-title">Product Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [5,6,7,8,10,11,12,48]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Order Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [13,14,15,16,17,18,19]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!--Row Two End-->  
                            <br>
                            <!--Row Three Start-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Task Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [9,20,21,22,49]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Note Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [27,28,29,30]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Reminder Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [31,32,33,34,47]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Row Three End--> 
                            <br>
                             <!--Row Four Start-->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Extra Charge Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [23,24,25,26,50]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="row no-gutters">
                                            <div class="col-md">
                                                <div class="card-body">
                                                    <h6 class="card-title">Other Priviledges</h6>
                                                        @foreach($priviledges->whereIn('PriviledgeID', [38,44,45,46,51]) as $priviledge)
                                                        <div class="form-group form-check col-sm-12">
                                                        <input type="checkbox" class="form-check-input" name="PriviledgeID[]" value="{{$priviledge->PriviledgeID}}" {{ $roles->priviledges->contains($priviledge->PriviledgeID) ? 'checked' : '' }}>
                                                        <label class="form-check-label checkbox-inline" for="PriviledgeID">{{$priviledge->Description}} </label>
                                                        </div> 
                                                        @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Row Four End-->  
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

<!-- Modal for updating -->

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