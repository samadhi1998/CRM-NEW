@extends('layouts.app')
@section('title','Add Note')
@section('header','Add Note')
@section('content')

        <!-- @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
    
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <!-- <div class="card-header">{{ __('Add Product') }}</div> -->
              <div class="card-body">
        <div class="container"  style="background :none !important ">
        <form method="POST" action="/addNote" enctype="multipart/form-data">
            @csrf
            <label for="OrderID"><b>Order ID: </b></label>
            <input type="text" name="OrderID" required >
            <br>
            <label for="Type"><b>Select Type : </b></label>
            <select  name="Type" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <option value="" selected disabled hidden></option>
                <option value="Pre-Site-Visit">Pre-Site-Visit</option>
                <option value="Site-Visit">Site-Visit</option>
                <option value="None">None</option>
            </select>
            <label for="Description" ><b>Description : </b></label>
            <textarea  name="Description"  required ></textarea>
            <br>
            <label for="file" ><b>Product View: </b></label>
            <input type="file" name="image">
            <br>
            <br>
            <div class="text-right">
             <button type="submit"  Value="Next"class="btn btn-primary">Add Product</button>	 			
              </div>
            </form>
            </div>
            </div></div></div></div>

@endsection