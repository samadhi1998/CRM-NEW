@extends('layouts.app')
@section('title','Edit Order')
@section('header','Edit Order Details')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
              
              <div class="card-body">
        <div class="container"  style="background :none !important ">
            <form action="{{ route('orders.store') }}" method="POST" id="myform">
                @csrf
            <label for="Due_date" ><b>Due Date: </b></label>
                <input type="date" name="Due_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$order->Due_date}}" >
            <br>
            <label for="Progress"><b>Progress : </b></label>
                <select name="Progress" value="{{$order->Progress}}" class="form-control" placeholder="Progress">
                    <option value="Select Progess">Select Progess</option>
                    <option value="Estimated Quotation">Estimated Quotation</option>
                    <option value="Order Confirmed">Order Confirmed</option>
                    <option value="Invoice">Invoice</option>
                </select>
            
            <div class="container" style="background :none !important ">
                        <form action="/orders" method="POST">
                            {{csrf_field()}}
                            <section>
                                <div class="panel panel-header"></div>
                                <div class="panel panel-footer" >
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ProductID</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Discount</th>
                                            <th>Amount</th>
                                            <th><a href="#" class="addRow"><span data-feather="plus"></span></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="ProductID" value="{{$order->ProductID}}" class="form-control" ></td>
                                            <td><input type="text" name="Description" value="{{$order->Description}}" class="form-control" ></td>
                                            <td><input type="text" name="Qty" value="{{$order->Qty}}" class="form-control quantity" ></td>
                                            <td><input type="text" name="Price" value="{{$order->Price}}" class="form-control budget"></td>
                                            <td><input type="text" name="Discount" value="{{$order->Discount}}" class="form-control budget"></td>
                                            <td><input type="text" name="amount" value="{{$order->amount}}" class="form-control amount"></td>

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
                                            <td><b><input type="text" name="Advance" value="{{$order->Advance}}"  class="form-control"></b></td>
                                            <td></td>          
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Balance</b></td>
                                            <td></td>
                                            <td><b class="total" name="amount" value="{{$order->amount}}" class="form-control"></b> </td>               
                                        </tr>
                                       
                                    </tfoot>
                                </table>                          
                            </div>    
                            <div class="btn-group float-right" role="group">
                                <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
                            </div>
                            <div class="btn-group float-right mr-2 " role="group">
                                <button type="submit" ><a href="/admin/users/index" class="text-my-own-color">Cancel</a></button>
                            </div><br><br>                        
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
                        You are going to update the deatils of Order ID {{$order->OrderID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection