@extends('layouts.app')

@section('content')

        <h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Add Order Details</h2>
        <hr style="background-color:#233554; height: 5px"><br>
        <div class="container">
            <form method="POST" action=" ">
                @csrf
                <label for="OrderID" ><b>OrderID : </b></label>
                <input type="text" name="OrderID" required  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <br>   
                <label for="Due_date" ><b>Due_date : </b></label>
                <input type="date" name="Name"  required  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <br>
                <label for="Progress"><b>Progress : </b></label>
                <select  name="Progress" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                    <option value="" selected disabled hidden></option>
                    <option value="Estimated Quotation">Estimated Quotation</option>
                    <option value="Order Confirmed">Order Confirmed</option>
                    <option value="Invoice">Invoice</option>
                </select>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button><br><br><br>
                </div>          
            </form>
        </div>
      
@endsection