@extends('orders.layout')
@section('content')
<div class="container"><br>
    <div class="col-lg-12 margin-tb">
        <div class="pull-center">
            <h2><strong>Abans (PVT) LTD <strong></h2>
            <h6>No.95, Galle Road, Moratuwa</h6>
            <h6>Tel : 0112 605 731 </h6>
            <h6>E-mail : buyabans@abansgroup.com</h6><br>
            <h3><strong> {{ $order->Progress }}<strong></h3>
            <br>
        </div> 
        <div class="pull-right">
            <h5><strong> NO : {{ $order->OrderID }}</strong></h5>
            <p><strong>Due Date  : {{$order->Due_date}}</strong><br>
            <strong>Created Date : {{ $order->created_at }}</strong></p>             
        </div>       
    </div>
</div>
<hr style="background-color:#233554; height:3px">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
           
        <hr style="background-color:#233554; height:3px">
    </div>
</div>

<table class="table table-bordered">
    <tr>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Discount</th>
      <th scope="col">Amount</th> 
    </tr>
    <tr>
        <td>{{$order->Description}}  </td>
        <td>  </td>
        <td>  </td>
        <td>{{ $order->Description }} </td>
        <td>  </td>
    </tr>
    <tr>
        <td>  </td>
        <td colspan="2">Total Price</td>
        <td>  </td>
        <td>{{ $order->Total_Price }} </td>
    </tr>
    <tr>
        <td>  </td>
        <td colspan="2">Advance Payment</td>
        <td>  </td>
        <td>{{ $order->Advance }}  </td>
    </tr>   
    <tr>
        <td>  </td>
        <td colspan="2">Balance</td>
        <td>  </td>
        <td> </td>
    </tr>
</table>
<br><br>
<!--<p>
    You were served by : 
    Quotation: {{ $order->QuotationEmpID }}, 
    Follow-up: {{ $order->FollowUpID }}, 
    Customer Care: {{ $order->CustomerCareID }}
</p>-->

<hr style="background-color:#233554; height:3px">
<div class="pull-right">

<a class="btn btn-primary" id="printPageButton" onclick="window.print()">Save & Print</button></a>
<a class="btn btn-primary" href="http://127.0.0.1:8000/send-mail"> E-mail</a>
    <br><br> 
</div>
</div>


@endsection