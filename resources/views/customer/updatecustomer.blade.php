@extends('layouts.app')
@section('title','Update Customer')
@section('content')


<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Modify Customer Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">

        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert" >
         {{$error}}
          </div>
           @endforeach
        <form method="POST" action="/editcustomers"id="myformcustomer">
            @csrf
            <label for="CustomerID">Customer ID</label>
             <input type="text"  name="CustomerID" value="{{$data['CustomerID']}}" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%">

            <label for="Name" ><b> Customer Name : </b></label>
            <input type="text" name="Name" value="{{$data['Name']}}" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="MobileNo" ><b>Mobile Number : </b></label>
            <input type="text" name="MobileNo"  value="{{$data['MobileNo']}}" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="NIC" ><b>NIC : </b></label>
            <input type="text" name="NIC" value="{{$data['NIC']}}" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Email" ><b>Email : </b></label>
            <input type="text" name="Email"  value="{{$data['Email']}}"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Address" ><b>Address : </b></label>
            <input type="text" name="Address"   value="{{$data['Address']}}"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" class="btn btn-primary" ><a href="/ViewCustomers">Cancel</a></button>
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
                        You are going to update the details of Customer ID {{$data->CustomerID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myformcustomer" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
@endsection