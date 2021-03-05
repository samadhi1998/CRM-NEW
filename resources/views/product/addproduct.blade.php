@extends('layouts.app')
@section('title','Add Products')
@section('content')

        <!-- @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
    
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Add Product') }}</div>
              <div class="card-body">
        <div class="container"  style="background :none !important ">
        <form method="POST" action="/addproduct">
            @csrf
            <label for="AdminID" ><b>Admin ID: </b></label>
            <input type="text" name="AdminID" required  value="{{ Auth::user()->id }}">
            <br>
            <label for="Name" ><b>Product Name : </b></label>
            <input type="text" name="Name" required >
            <br>
            <label for="Brand" ><b>Brand : </b></label>
            <input type="text" name="Brand" required >
            <br>
            <label for="Price" ><b>Price : </b></label>
            <input type="number" name="Price" required="true" min="1" required >
            <br>
            <label for="Qty" ><b>Quantity : </b></label>
            <input type="number" name="Qty" required="true"min="1" required >
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea  name="Description"  required ></textarea>
            <br>
            <br>
            <div class="text-right">
             <button type="submit"  Value="Next"class="btn btn-primary">Add Product</button>	 			
              </div>
            </form>
            </div>
            </div></div></div></div>

@endsection