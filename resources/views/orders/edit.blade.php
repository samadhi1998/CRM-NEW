@extends('layouts.app')
@section('title','Edit Order')
@section('content')
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
        <style>
            button {
                background-color: white;
                color: #233554;
                border-radius: 40px;
                margin: auto;
                display: block;
                float: right;
            }
            label{
                color: #233554;
            }
            option{
                color: #233554;
            }
            form{
                margin-left: auto;
                margin-right: auto;
                border: 2px;
            }
            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 40px;
                width: 50%;
                margin-left: auto;
                margin-right: auto;
            }
            .text-my-own-color {
                color: #233554 !important; 
            }
            a:hover {
                text-decoration: none;
            }
            a:active {
                text-decoration: none;
            }
            .btn-primary {
                background-color: #233554 !important;
                color: white !important; 
                border-color: white !important;
                border-radius: 40px !important;
            }
            .btn-secondary {
                background-color: white !important;
                color: #233554 !important; 
                border-color: #233554 !important;
                border-radius: 40px !important;
            }
        </style>  
    </head>

    <!-- <?php
    echo $orders;
    ?>   -->


@foreach ($orders as $order)

        <h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Update Order Details</h2>
        <hr style="background-color:#233554; height: 5px"><br>

        <div class="container">
            <form action="{{ route('orders.update',$order->OrderID) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="Due_date" ><b>Due Date: </b></label>
                <input type="date" name="Due_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$order->Due_date}}" ><br>
            
            <label for="Progress"><b>Progress : </b></label>
                <select name="Progress" value="{{$order->Progress}}" class="form-control" placeholder="Progress">
                    <option value="Select Progess">Select Progess</option>
                    <option value="Estimated Quotation">Estimated Quotation</option>
                    <option value="Quotation">Quotation</option>
                    <option value="Invoice">Invoice</option>
                </select>
                         
        <div class="container">
        <form action="{{ route('orders.update',$order->OrderID) }}" method="POST">
            {{csrf_field()}}
                <div class="panel panel-header"></div></div>
                    <div class="panel panel-footer" >
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
                                <td><input type="text" name="ProductID" value="{{$order->ProductID}}" class="form-control"></td>
                                <td><input type="text" name="Qty" value="{{$order->Qty}}" class="form-control"></td>                                                           
                                <td><input type="text" name="Discount" value="{{$order->Discount}}" class="form-control"></td>                                        
                                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Advance</b></td>
                                <td><b><input type="text" name="Advance" value="{{$order->Advance}}" class="form-control"></b></td>        
                            </tr>                                     
                        </tfoot>
                    </table>    
                    <br><br>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button><br><br><br>
                 </div>  
                <br><br>       
                 

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
                                '<td><input type="text" name="ProductID[]" class="form-control" ></td>'+
                                '<td><input type="text" name="Qty[]" class="form-control quantity" ></td>'+
                                ' <td><input type="text" name="Discount[]" class="form-control amount"></td>'+
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
                </div>
            </div>
        </form>
    </form>

  @endforeach
  @endsection       
           
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        </body>
    </html>