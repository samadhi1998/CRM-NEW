@extends('layouts.app')
@section('title','Add priviledge')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    Assign Priviledges
                </div>
                <div class="card-body">
                <form method="POST" action="">
                        @csrf
                        <label for="Role"><b>Role : </b></label>
                        <select  name="Role" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                        @foreach($roles as $role)
                            <option value="{{$roles->name}}">{{$roles->name}}</option>
                        @endforeach
                        </select>
                    <br>
                    <br>
                    <ul class="list-group list-group-flush">
                    <!-- User Managament -->
                        <li class="list-group-item">
                            <div class="checkbox">
                            <label><input type="checkbox" value=""> Add User</label>
                            </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
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
                        <!-- Customer Managament -->
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
                        <!-- Product Managament -->
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
                        <!-- Order Managament -->
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
                        <!-- Charge Managament -->
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
                        <!-- Invoice Quotation and Report Managament -->
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
                        <!-- Notes and Reminders Managment -->
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
                        <!-- Chat and GPS Managment -->
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Chat with Customer</label>
                        </div>
                        </li>
                        <li class="list-group-item"><div class="checkbox">
                            <label><input type="checkbox" value=""> Locate Service Person</label>
                        </div>
                        </li>
                    </ul>
                    
                 </div>
            </div>
        </div>
@endsection