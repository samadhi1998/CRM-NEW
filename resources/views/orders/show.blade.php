@extends('layouts.app')
@section('title','Add Order')
@section('content')

<div class="container">
    <div>
        <h1 style="text-align: center; color:#233554">XYZ PVT(LTD).</h1>
        <h4 style="text-align: center; color:#233554">No.95, Galle Road, Moratuwa</h4>
        <h5 style="text-align: center; color:#233554">Tel : 0112 605 731</h5>
        <h5 style="text-align: center; color:#233554">E-mail : buyxyz@xyzgroup.com</h5><BR>
        <hr style="background-color:#233554; height: 3px"><br>
        <h4 style="text-align: center; color:#233554">{{ $order->Progress }}</h4><br><br>
    </div>
    <div class="pull-left">
        <h5><strong> NO : {{ $order->OrderID }}</strong></h5>
        <p><strong>Due Date  : {{$order->Due_date}}</strong><br>
        <strong>Created Date : {{ $order->created_at }}</strong></p>   
        <hr style="background-color:#233554; height: 3px">         
        <p><strong><br>Amal Fernando<br> No:185, Galle Road, Pandura<br> 077 1159687<br>amal@gmail.com</p><br>  
    </div>   

       
    <table class="table table-bordered">
        <tr>
        <th scope="col">Description</th>
        <th scope="col">Quantity</th>
        <th scope="col">Unit Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Total</th> 
        </tr>
        <tr>
            <td>A/C</td>
            <td>1</td>
            <td> 100000</td>
            <td>{{ $order->Discount }} </td>
            <td>100000</td>
        </tr>
        <tr>
            <td>Fan</td>
            <td>1</td>
            <td> 10000</td>
            <td>{{ $order->Discount }} </td>
            <td>10000</td>
        </tr>
        <tr>
            <td>  </td>
            <td colspan="2">Total Price</td>
            <td>  </td>
            <td> </td>
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
</div>
<!--<p>
    You were served by : 
    Quotation: {{ $order->QuotationEmpID }}, 
    Follow-up: {{ $order->FollowUpID }}, 
    Customer Care: {{ $order->CustomerCareID }}
</p>-->
<div class="container">
    <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Save</button></a>
    <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
    <a class="btn btn-primary" href="http://127.0.0.1:8000/emails"> E-mail</a><br><br> 
</div>


@endsection