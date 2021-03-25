@extends('layouts.app')
@section('title','Add Order')
@section('content')
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">     
    </head>

<div class="container" style="background :none !important ">
<div class="row justify-content-center">
    <div class="col-md">
    <div class="card">
        <div class="card-body">

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <label for="OrderID" ><b>Order ID : </b></label>
                    <input type="text" name="OrderID" class="form-control">
                <br><br>

                <label for="CustomerID" ><b>Customer ID : </b></label>
                    <input type="text" name="CustomerID" class="form-control">
                <br><br>

                <label for="Due_date" ><b>Due Date : </b></label>
                    <input type="date" name="Due_date" class="form-control" >
                <br><br>

                <label for="Progress"><b>Progress : </b></label>
                    <select  name="Progress" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                        <option value="" selected disabled hidden></option>
                        <option value="Estimated Quotation">Estimated Quotation</option>
                        <option value="Order Confirmed">Quotation</option>
                        <option value="Invoice">Invoice</option>
                    </select> <br><br>


                    <br><br>
                    <div class="col-md">
                    <div class="card">
                        <form action="/orders" method="POST">
                            {{csrf_field()}}
                            <section>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ProductID</th>                                    
                                            <th>Quantity</th>                                     
                                            <th>Discount</th>                                        
                                            <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="ProductID" class="form-control" ></td>                                           
                                            <td><input type="text" name="Qty" class="form-control quantity" ></td>                                       
                                            <td><input type="text" name="Discount" class="form-control budget"></td>                                       
                                            <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b>Advance</b></td>  
                                            <td><b><input type="text" name="Advance" class="form-control"></b></td>     
                                        </tr> 
                                    </tfoot>
                                </table>        
                            <br><br>    
                            </div>      
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button><br><br><br>
                                </div>                   
                        </div>

                        <script type="text/javascript">
                            $('tbody').delegate('.quantity,.budget','keyup',function(){
                                var tr=$(this).parent().parent();
                                var quantity=tr.find('.quantity').val();
                                var budget=tr.find('.budget').val();
                                var amount=(quantity*budget);
                                tr.find('.amount').val(amount);
                                total();
                            });
                            function total(){
                                var total=0;
                                $('.amount').each(function(i,e){
                                    var amount=$(this).val()-0;
                                total +=amount;
                            });
                            $('.total').html(total+".00 ");   
                            }
                            $('.addRow').on('click',function(){
                                addRow();
                            });
                            function addRow()
                            {
                                var tr='<tr>'+
                                '<td><input type="text" name="productID[]" class="form-control" ></td>'+
                                '<td><input type="text" name="Qty[]" class="form-control"></td>'+
                                 '<td><input type="text" name="Discount[]" class="form-control budget"></td>'+
                                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                                '</tr>';
                                $('tbody').append(tr);
                            };
                            $('.remove').live('click',function(){
                                var last=$('tbody tr').length;
                                if(last==1){
                                    alert("You can not remove this row");
                                }
                                else{
                                    $(this).parent().parent().remove();
                                }                         
                            });
                        </script>  
                @endsection
            </form>

            </div>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        </body>
    </html>