@extends('layouts.app')
@section('title','Add Customer')
@section('header','Add Customer Information')
@section('content')
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <br>
                    <br>
                    @if ($errors->any())
                   <div class="alert alert-danger">
                   <b>
                   <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                   @endforeach
                   </ul>
                   </b>
                   </div>
                   @endif
                    <form method="POST" action="/addCustomer" id="myform">
                        @csrf
                        <label for="Name" ><b> Customer Name : </b></label>
                        <input type="text" name="Name" value="{{ old(' Name ') }}">
                        <br>
                        <label for="MobileNo" ><b>Mobile Number : </b></label>
                        <input type="text" name="MobileNo"  value="{{ old(' MobileNo ') }}">
                        <br>
                        <label for="NIC" ><b>NIC : </b></label>
                        <input type="text" name="NIC" value="{{ old(' NIC ') }}">
                        <br>
                        <label for="Email" ><b>Email : </b></label>
                        <input type="text" name="Email" value="{{ old('Email') }}">
                        <br>
                        <label for="Address" ><b>Address : </b></label>
                        <input type="text" name="Address" value="{{ old('Address') }}">
                        <br>
                        <br>
                        <div class="text-right">
                            <button type="submit"  Value="save"class="btn btn-primary">Save</button>	 			
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection