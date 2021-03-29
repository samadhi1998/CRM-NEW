@extends('layouts.app')
@section('title','Add Customer')
@section('content')
<div class="container" style="background :none !important ">
<div class="row justify-content-center">
<div class="col-md">
<div class="card">
<div class="card-header">{{ __('Add Customer') }}</div>
<div class="card-body">
</br>
<br>
        <form method="POST" action="/addCustomer" id="myform">
            @csrf
            <label for="Name" ><b> Customer Name : </b></label>
            <input type="text" name="Name" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            
            </br>
            <label for="MobileNo" ><b>Mobile Number : </b></label>
            <input type="text" name="MobileNo" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
           
            </br>
            <label for="NIC" ><b>NIC : </b></label>
            <input type="text" name="NIC" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
           
            <label for="Email" ><b>Email : </b></label>
            <input type="text" name="Email" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
           
            </br>
            <label for="Address" ><b>Address : </b></label>
            <input type="text" name="Address" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
          
            </br>
            <br>
            <div class="text-right">
            <button type="submit"  Value="save"class="btn btn-primary">Save</button>	 			
            </div>
            </form>
</div></div></div></div></div></div>
@endsection