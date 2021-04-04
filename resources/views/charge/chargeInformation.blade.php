@extends('layouts.app')
@section('title','Product Information')
@section('header','View Charges')
@section('content')

@foreach ($extra_charges as $charges)
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card" >
                <div class="card-header">{{ __('Chargers Details') }}</div>
                    <div class="card-body">
                        <strong><p>
                            Extra-Charge ID : {{ $charges->ExtraChargeID }}<br>
                            Created Date : {{  $charges->Created_at }}<br> 
                            Order ID: {{ $charges->OrderID }}
                        </strong></p>
                        <h6 class="card-title"><strong>Sevice Person Information:</strong></h6>
                        <p><strong> 
                            Service Person ID: {{$charges->ServicePersonID }} <br>
                            Service Person  Name :{{$charges->name }}<br>
                            Contact Number : {{ $charges->MobileNo}} <br>
                            Service Person Email  : {{$charges->email}} <br>
                        </strong></p>  
                        <br>
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