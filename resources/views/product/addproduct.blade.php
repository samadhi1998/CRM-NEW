@extends('layouts.app')
@section('title','Add Products')
@section('content')


<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Product Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">
        <!-- @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
         
        
        <form method="POST" action="/addproduct">
            @csrf

          

            <label for="AdminID" ><b>Admin ID: </b></label>
            <input type="text" name="AdminID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            
            <label for="Name" ><b>Product Name : </b></label>
            <input type="text" name="Name"  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <div class="alert alert-danger" >  {{ $errors->first('Name')}}</div>
            <br>
            <label for="Brand" ><b>Brand : </b></label>
            <input type="text" name="Brand"   required  style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <div class="alert alert-danger" >  {{ $errors->first('Brand')}}</div>
            <br>
            <label for="Price" ><b>Price : </b></label>
            <input type="number" name="Price"required="true" min="500" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Qty" ><b>Quantity : </b></label>
            <input type="number" name="Qty" required="true"min="1" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea  name="Description"  required  style="background: #ffffff; margin: 15px 0 22px 0; border: none; padding: 10px; width: 100%" ></textarea>
            <br>
            
            <br>
            <div class="text-right">
             <button type="submit"  Value="Next"class="btn btn-default btn-lg">Add Product</button>	 			
              </div>
            </form>
        </div>

@endsection