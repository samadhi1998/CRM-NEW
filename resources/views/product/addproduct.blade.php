@extends('layouts.app')
@section('title','Add Products')
@section('header','Add Product Information')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Add Product') }}</div> 
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
                   <b>
                   </div>
                   @endif
                    <div class="container"  style="background :none !important ">
                        <form method="POST" action="/addproduct" enctype="multipart/form-data">
                            @csrf
                            <label for="Name" ><b>Product Name : </b></label>
                            <input type="text" name="Name" required >
                            <br>
                            <label for="Brand" ><b>Brand : </b></label>
                            <input type="text" name="Brand"  >
                            <br>
                            <label for="file" ><b>Product View: </b></label>
                            <input type="file" name="image" >
                            <br>
                            <label for="Price" ><b>Price : </b></label>
                            <input type="number" name="Price" >
                            <br>
                            <label for="Qty" ><b>Quantity : </b></label>
                            <input type="number" name="Qty" >
                            <br>
                            <label for="Warranty"><b>Warranty : </b></label>
                                <select  name="Warranty" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                                    <option value="" selected disabled hidden></option>
                                    <option value="one-year-warranty">One Year Warranty</option>
                                    <option value="two-year-Warranty">Two Year Warranty</option>
                                    <option value="three-year-Warranty">Three Year Warranty</option>
                                    <option value="No-Wrranty">No Warranty</option>
                                </select>
                            <br>
                            <label for="Description" ><b>Description : </b></label>
                            <textarea  name="Description" ></textarea>
                            <br>
                            <br>
                            <div class="text-right">
                                <button type="submit"  Value="Next"class="btn btn-primary">Add Product</button>	 			
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection