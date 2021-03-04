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
        <form method="POST" action="/Updateproducts"id="myformproduct">
            @csrf
            <label for="AdminID" ><b>Admin ID : </b></label>
            <input type="text" name="AdminID" value="{{$products['AdminID']}}" name="Name"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="ProductID" ><b>Product ID: </b></label>
            <input type="text" name="ProductID" value="{{$products['ProductID']}}" name="Name"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Name" ><b>Product Name : </b></label>
            <input type="text" name="Name" value="{{$products['Name']}}"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Brand" ><b>Brand : </b></label>
            <input type="text" name="Brand" value="{{$products['Brand']}}" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Price" ><b>Price : </b></label>
            <input type="number" name="Price" value="{{$products['Price']}}" min="1" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Qty" ><b>Quantity : </b></label>
            <input type="number" name="Qty"  value="{{$products['Qty']}}" min="1" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea name="Description" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" rows="5" cols="50" >{{$products->Description}}</textarea>
            <br>
            <label for="Status" ><b>Status : </b></label>
            <input type="text" name="Status" value="{{$products['Status']}}"required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" class="btn btn-primary" ><a href="product/viewproduct">Cancel</a></button>
            </div>     
            </form>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:#233554">Update Alert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color:#233554">
                    You are going to update the progress of Product {{$products->ProductID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myformproduct" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>        

@endsection