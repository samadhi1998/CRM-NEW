@extends('layouts.app')
@section('title','Add Order')
@section('header','Add Order Details')
@section('content')

<div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
              <!-- <div class="card-header">{{ __('Create Order') }}</div> -->
              <div class="card-body">
        <div class="container"  style="background :none !important ">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <label for="CustomerID" ><b>CustomerID : </b></label>
                    <input type="text" name="CustomerID" class="form-control" required  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <br>   
                <label for="Due_date" ><b>Due_date : </b></label>
                    <input type="date" name="Due_date" class="form-control" required  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <br>
                <label for="Progress"><b>Progress : </b></label>
                    <select  name="Progress" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                        <option value="" selected disabled hidden></option>
                        <option value="Estimated Quotation">Estimated Quotation</option>
                        <option value="Order Confirmed">Order Confirmed</option>
                        <option value="Invoice">Invoice</option>
                    </select>

                    <div class="container" style="background :none !important ">
<div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
            <div class="card-header">{{ __('Add products') }}</div>
                <div class="card-body">
                        <form action="/orders" method="POST">
                            {{csrf_field()}}
                            <section>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ProductID</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Amount</th>
                                            <th><a href="#" class="addRow"><span data-feather="plus"></span></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="ProductID" class="form-control" ></td> 
                                            <td><input type="text" name="Description" class="form-control" ></td>
                                            <td><input type="text" name="Qty" class="form-control quantity" ></td>
                                            <td><input type="text" name="Price" class="form-control budget"></td>
                                            <td><input type="text" name="Discount" class="form-control budget"></td>
                                            <td><input type="text" name="amount" class="form-control amount"></td>
                                            <td><a href="#" class="btn btn-danger remove"><span data-feather="delete"></span></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total Price</b></td>
                                            <td></td>
                                            <td><b class="total" name="Total_Price" class="form-control"></b></td>               
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Advance</b></td>
                                            <td></td>     
                                            <td><b><input type="text" name="Advance" class="form-control"></b></td>     
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Balance</b></td>
                                            <td></td>
                                            <td><b class="total"></b> </td>               
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
                                '<td><input type="text" name="product_name[]" class="form-control" ></td>'+
                                '<td><input type="text" name="product_name[]" class="form-control" ></td>'+
                                '<td><input type="text" name="brand[]" class="form-control"></td>'+
                                '<td><input type="text" name="quantity[]" class="form-control quantity" ></td>'+
                                '<td><input type="text" name="budget[]" class="form-control budget"></td>'+
                                ' <td><input type="text" name="amount[]" class="form-control amount"></td>'+
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
                        </form>
            </div>
            </div></div></div></div>
                @endsection
                

         
       