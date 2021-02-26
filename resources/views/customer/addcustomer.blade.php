@extends('layouts.app')
@section('title','Add Customer')
@section('content')
<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Get Customer Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">

        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach
        <form method="POST" action="/addCustomer" id="myform">
            @csrf
            
            <label for="Name" ><b> Customer Name Enter: </b></label>
            <input type="text" name="Name"  name="Name"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="MobileNo" ><b>Mobile Number : </b></label>
            <input type="text" name="MobileNo" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="NIC" ><b>NIC : </b></label>
            <input type="text" name="NIC" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Email" ><b>Email : </b></label>
            <input type="text" name="Email" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Address" ><b>Address : </b></label>
            <input type="text" name="Address" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <br>
            <div class="text-right">
             <button type="submit"  Value="Next"class="btn btn-default btn-lg">NEXT</button>	 			
              </div>
            </form>
        </div>
@endsection