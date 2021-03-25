@extends('layouts.app')
@section('title','Estimated Quotation/Invoice')
@section('content')
@foreach ($orders as $ord)

<div class="container">
<div class="row justify-content-center">
    <div class="col-md">
    <div class="card">
        <div class="card-body">

    <div>
        <h1 style="text-align: center; color:#233554">ABC PVT(LTD).</h1>
        <h4 style="text-align: center; color:#233554">No.95, Galle Road, Moratuwa</h4>
        <h5 style="text-align: center; color:#233554">Tel : 0112 605 731</h5>
        <h5 style="text-align: center; color:#233554">E-mail : buyabc@abcgroup.com</h5><BR>
        <hr style="background-color:#233554; height: 3px"><br>
        <h4 style="text-align: center; color:#233554">{{ $ord->Progress }}</h4><br><br>
    </div>
    <div class="pull-left">
        <h5><strong> NO : {{ $ord->OrderID }}</strong></h5>
        <p><strong>Due Date  : {{$ord->Due_date}}</strong><br>
        <strong>Created Date : {{ $ord->Created_at }}</strong></p>   
        <hr style="background-color:#233554; height: 3px"> 
    </div>   
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="pull-left">
        <h5><strong>{{ $ord->CustomerName }}</strong></h5>
        <p><strong> 
            {{ $ord->Address }} <br>
            {{ $ord->MobileNo }} <br>
            {{ $ord->Email }} <br>
        </strong></p>   
        <hr style="background-color:#233554; height: 3px"> 
    </div>  
    <table class="table table-bordered">
        <tr>
            <th scope="col">Description</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Discount</th>
            <th scope="col">Total</th>  
        </tr>     
        <tr>
            <td>{{ $ord->ProductName }} </td>   
            <td>{{ $ord->Price }} </td>   
            <td>{{ $ord->Qty }} </td>   
            <td>{{ $ord->Discount }} </td>       
            <td>{{ $ord->Price * $ord->Qty }} </td>        
        </tr>
        <tr>
            <td>  </td>
            <td colspan="2">Total Price</td>
            <td>  </td>
            <td>{{ $ord->Price * $ord->Qty }}</td>
        </tr>
        <tr>
            <td>  </td>
            <td colspan="2">Advance Payment</td>
            <td>  </td>
            <td>{{ $ord->Advance }}  </td>
        </tr>
        <tr>
            <td>  </td>
            <td colspan="2">Balance</td>
            <td>  </td>
            <td>{{ ($ord->Price * $ord->Qty ) - $ord->Advance  }}  </td>
        </tr>
    </table>

    <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Save</button></a>
    <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>
    <a class="btn btn-primary" href="http://127.0.0.1:8000/emails"> E-mail</a><br><br> 

</div>

</div>

</div>

@endforeach

@endsection