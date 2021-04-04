@extends('layouts.app')
@section('title','View Charge')
@section('header','View Additional Charges')
@section('content')

@if(Auth::user()->can('add-charge', App\Models\extra_charge::class))
    <div class="pull-left">
        <a class="btn btn-primary" href="/addChargers">Add Charges <span data-feather="plus"></a>
    </div>
@endif
<br>
<br>
<div class="container" style="background :none !important ">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <br>
                        <form action="/Search_Chargers" method="GET" role="search">
                        {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" id="query"
                                placeholder="Search Chargers Details."> 
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </br>
                    <br>
                    <table>
                        <tr>
                            <th>Extra-Charge ID </th>
                            <th>Order ID</th>
                            <th>ServicePerson ID</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach($extra_charge as $extra_charges)
                        <tr>                                                
                            <th scope="row">{{ $extra_charges['ExtraChargeID']}}</th>
                            <td>{{$extra_charges['OrderID']}}</td>
                            <td>{{$extra_charges['ServicePersonID']}}</td>
                            <td>{{$extra_charges['Type']}}</td>
                            <td>{{$extra_charges['Amount']}}</td>
                            <td>{{$extra_charges['Description']}}</td>
                            <td>
                            @if(Auth::user()->can('edit-charge', App\Models\extra_charge::class))
                                <a href="/ExtrachargeInformation/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
                            @endif
                            @if(Auth::user()->can('delete-charge', App\Models\extra_charge::class))
                                <a href= "/UpdateChargers/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="trash-2"></span></a>                               
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {{$extra_charge->links()}}

                    <div class="pull-right" style="text-align: right;color:blue">
                        <a href="{{ URL::previous() }}">Go Back</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection