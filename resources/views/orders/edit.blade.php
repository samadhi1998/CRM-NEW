@extends('layouts.app')
@section('title','Edit Order')
@section('header','Edit Order')
@section('content')

<div class="row justify-content-center">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <div class="container"  style="background :none !important ">      
                    <form method="POST" action="/edit" id="myform">
                        @csrf
                        <label for="OrderID" ><b>Order ID : </b></label>
                        <input type="text" name="OrderID" value="{{$order->OrderID}}" readonly>
                        <br>
                        <label for="Due_Date" ><b>Due Date : </b></label>
                        <input type="date" name="Due_Date" value="{{$order->Due_date}}">
                        <br>
                        <label for="Status"><b>Status : </b></label>
                        <select name="Progress" value="{{$order->Progress}}" class="form-control" placeholder="Progress">
                            <option value="{{$order->Progress}}" selected hidden>{{$order->Progress}}</option>
                            <option value="Estimated Quotation">Estimated Quotation</option>
                            <option value="Invoice">Invoice</option>
                        </select>
                        <br>
                        <div class="card-body">
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
                                        <input type="text" name="products[]" value="{{$product->ProductName}} " class="form-control">            
                                    </td>
                                    <td>                      
                                        <input type="number" name="quantities[]" value="{{$product->Qty}}" class="form-control" value="1" />
                                    </td>                     
                                </tr>
                            @endforeach
                                <tr id="product1"></tr>                 
                            </tbody>  
                            <tfoot>
                                <tr>
                                    <td><b>Advance</b></td>
                                    <td><b><input type="text" name="Advance" value="{{$order->Advance}}" class="form-control"></b></td>        
                                </tr>                                     
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

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



  @endsection