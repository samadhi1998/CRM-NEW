@extends('layouts.app')
@section('title','Charge Information')
@section('header','View Charge Information')
@section('content')

@foreach ($extra_charges as $charges)
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                    <div class="card-body">
                    <h6 class="card-title"><strong> Order ID: {{ $charges->OrderID }}</strong></h6>
                        <strong><p style="text-align:left;color:#233556">
                            Extra-Charge ID : {{ $charges->ExtraChargeID }}<br>
                            Created Date : {{  $charges->Created_at }}<br> 
                        </strong></p>
                        <h6 class="card-title"><strong>Sevice Person Information:</strong></h6>
                        <p style="text-align:left;color:#233556"><strong> 
                            Service Person ID: {{$charges->ServicePersonID }} <br>
                            Service Person  Name :{{$charges->name }}<br>
                            Contact Number : {{ $charges->MobileNo}} <br>
                            Service Person Email  : {{$charges->email}} <br>
                        </strong></p>  
                        
                        <h6 class="card-title"><strong>Chargers Information :</strong></h6>
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col"> Charge Type</th>
                                <th scope="col"> Charge Amount</th>
                                <th scope="col"> Charge Description</th>
                            </tr>
                            <tr>                         
                                <td>{{ $charges->Type}} </td>
                                <td>{{ $charges->Amount}} </td>   
                                <td>{{  $charges-> Description}} </td>                       
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach 

@endsection