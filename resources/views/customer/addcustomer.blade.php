@extends('layouts.app')
@section('title','Add Customer')
@section('header','Add Customer Details')
@section('content')


        <!-- @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
           <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <!-- <div class="card-header">{{ __('Add Customer') }}</div> -->
              <div class="card-body">
        <div class="container"  style="background :none !important ">
        <form method="POST" action="/addCustomer" id="myform">
            @csrf
            
            <label for="Name" ><b> Customer Name : </b></label>
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
             <button type="submit"  Value="Next"class="btn btn-primary">Next</button>	 			
              </div>
            </form>
        </div>
@endsection