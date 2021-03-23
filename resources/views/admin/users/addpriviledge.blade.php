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
                 
                        <!-- <li class="list-group-item"><div class="checkbox">
                           <label><input type="checkbox" value=""> View User Details</label>
                           </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update User Details</label>
                            </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete User Details</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Customer</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Customer Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Customer Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Customer Details</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Products</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Product Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Product Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Product Details</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Order</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Order Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Order Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Order Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Order Progress</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Order Progress</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Charges</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Charge Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Charge Details</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Charge Details</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Invoice</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Invoice</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Invoice</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Invoice</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Quotation</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Quotation</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Quotation</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Quotation</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Create Report</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Report</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Report</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Report</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Notes</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Notes</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Notes</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Notes</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Add Reminder</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> View Reminder</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Update Reminder</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Delete Reminder</label>
                        </div>
                        </li>
                        
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Chat with Customer</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Locate Service Person</label>
                        </div>
                        </li> -->
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