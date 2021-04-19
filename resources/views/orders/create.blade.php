@extends('layouts.app')
@section('title','Add Order')
@section('header','Create Order')
@section('content')
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
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
                    <form action="{{ route('orders.store') }}" method="POST">
                    @csrf     
                    <label for="CustomerID" ><b>Customer ID : </b></label>
                    <input type="text" name="CustomerID" class="form-control" value="{{$customers->CustomerID}}" readonly>
                    <br><br>
                    <label for="Name" ><b>Customer Name : </b></label>
                    <input type="text" name="Name" class="form-control" value="{{$customers->Name}}" readonly>
                    <br><br>
                    <label for="Due_date" ><b>Due Date : </b></label>
                    <input type="date" name="Due_date" class="form-control">
                    <br><br>
                    <label for="Status"><b>Status : </b></label>
                    <select class="form-control" id="type"  name="Status">
                        <option value="" selected disabled hidden></option>
                        <option value="Estimated Quotation">Estimated Quotation</option>
                        <option value="Invoice">Invoice</option>
                    </select>   
                    <br><br>   
                    <label for="Order_Items "><b>Order Items : </b></label>
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="product0">
                                <td>
                                    <select name="products[]" class="form-control">
                                        <option value="">-- choose product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->ProductID }}">
                                                {{ $product->Name }} (Rs.{{ number_format($product->Price, 2) }} )
                                                -- Only {{ $product->Qty}} left in the stock --
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantities[]" class="form-control" value="1" />
                                </td>
                            </tr>
                            <tr id="product1"></tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><b>Discount</b></td>  
                                <td><b><input type="number" name="Discount" class="form-control"></b></td>     
                            </tr> 
                            <tr>
                                <td><b>Advance</b></td>  
                                <td><b><input type="number" name="Advance" class="form-control"></b></td>     
                            </tr> 
                        </tfoot>             
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-outline-primary pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-outline-danger">- Delete Row</button>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Add Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection