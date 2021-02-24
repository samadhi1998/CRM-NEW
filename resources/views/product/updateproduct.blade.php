@extends('layouts.app')
@section('title','Update Products')
@section('content')


<h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554"> Update Product Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">

        @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach
        <form method="POST" action="/Updateproducts">
            @csrf
            <label for="AdminID" ><b>Admin ID : </b></label>
            <input type="text" name="AdminID" value="{{$data['AdminID']}}" name="Name"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="ProductID" ><b>Product ID: </b></label>
            <input type="text" name="ProductID" value="{{$data['ProductID']}}" name="Name"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Name" ><b>Product Name : </b></label>
            <input type="text" name="Name" value="{{$data['Name']}}"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Brand" ><b>Brand : </b></label>
            <input type="text" name="Brand" value="{{$data['Brand']}}" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Price" ><b>Price : </b></label>
            <input type="number" name="Price" value="{{$data['Price']}}"required="true" min="100" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Qty" ><b>Quantity : </b></label>
            <input type="number" name="Qty" required="true" value="{{$data['Qty']}}" min="10" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea  name="Description"  value="{{$data['Description']}}"required style="background: #ffffff; margin: 15px 0 22px 0; border: none; padding: 10px; width: 100%" ></textarea>
            <br>
            <label for="Status" ><b>Status : </b></label>
            <input type="text" name="Status" value="{{$data['Status']}}"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <br>
            <div class="text-right">
            <button type="submit"  Value="Next"class="btn btn-default btn-lg">Update Product</button>	 			
            </div>
            </form>
        </div>

@endsection