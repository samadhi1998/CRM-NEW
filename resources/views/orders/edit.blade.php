@extends('layouts.app')
@section('title','Edit Order')
@section('header','Edit Order')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
@endif
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/edit" id="myform">
                        @csrf
                            <label for="OrderID" ><b>Order ID : </b></label>
                            <input type="text" name="OrderID" value="{{$order->OrderID}}" readonly>
                            <br><br>
                            <label for="CustomerID" ><b>Customer ID: </b></label>
                            <input type="text" name="CustomerID"  value="{{$order->CustomerID}}" readonly>
                            <br><br>
                            <label for="Name" ><b>Customer Name: </b></label>
                            <input type="text" name="Name" value="{{optional($order->customers)->Name}}" readonly>
                            <br><br>
                            <label for="Due_date" ><b>Due Date : </b></label>
                            <input type="date" name="Due_date" value="{{$order->Due_date}}" >
                            <br><br>
                            <label for="Status"><b>Status : </b></label>
                            <select name="Status" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                                <option value="{{$order->Status}}" selected hidden>{{$order->Status}}</option>
                                <option value="Estimated Quotation">Estimated Quotation</option>
                                <option value="Invoice">Invoice</option>
                            </select>
                            <br><br>
                            <label for="Order_Items "><b>Order Items : </b></label><br><br>
                            <table class="table" id="products_table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>    
                                <tbody>
                                @foreach ($products as $product)
                                    <tr id="product0">
                                        <td>       
                                        <select name="products[]"  class="form-control">
                                        <option value="{{ $product->ProductID }}">  {{ $product->Name }}</option> 
                                        </select>
                                        <td>                      
                                            <input type="number" name="quantities[]" value="{{$product->Qty}}" class="form-control" value="1" />
                                        </td>                     
                                    </tr>
                                @endforeach
                                    <tr id="product1"></tr>                 
                                </tbody>  
                                <tfoot>
                                    <tr>
                                        <td><b>Discount</b></td>  
                                        <td><b><input type="number" name="Discount" class="form-control" value="{{$order->Discount}}"></b></td>     
                                    </tr> 
                                    <tr>
                                        <td><b>Advance</b></td>  
                                        <td><b><input type="number" name="Advance" class="form-control" value="{{$order->Advance}}"></b></td>     
                                    </tr> 
                                </tfoot>  
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-outline-primary pull-left">+ Add Row</button>
                                    <button id='delete_row' class="pull-right btn btn-outline-danger">- Delete Row</button>
                                </div>
                            </div>
                            <script type="text/javascript">
                            $(document).ready(function(){
                                let row_number = 1;
                                $("#add_row").click(function(e){
                                e.preventDefault();
                                let new_row_number = row_number - 1;
                                $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
                                $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
                                row_number++;
                                });

                                $("#delete_row").click(function(e){
                                e.preventDefault();
                                if(row_number > 1){
                                    $("#product" + (row_number - 1)).html('');
                                    row_number--;
                                }
                                });
                            });                    
                            </script>

                            <br>
                            <div class="btn-group float-right" role="group">
                                <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
                            </div>
                            <div class="btn-group float-right mr-2 " role="group">
                                <button type="submit" ><a href="/index" class="text-my-own-color">Cancel</a></button>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                You are going to update the details of Order ID {{$order->OrderID}} . Do you want to continue ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="myform" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection

