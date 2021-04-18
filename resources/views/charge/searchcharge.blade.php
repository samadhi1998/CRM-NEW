@extends('layouts.app')
@section('title','Search Charge')
@section('header','Search Charges')
@section('content')

<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
     <div class="card" >
       <div class="card-header">{{ __('search chargers') }}</div>
        <div class="card-body">
          <br>
          <div class="table-responsive">
          <table>
            <tr>
              <th>Order ID</th>
              <th>ServicePerson ID</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Description</th>
              <th> Action </th>
            </tr>
            <tbody>
            @foreach($extra_charge as $extra_charges)
              <tr>                                              
                <td  scope="row">{{ $extra_charges['OrderID']}}</th>
                <td>{{$extra_charges['ServicePersonID']}}</td>
                <td>{{$extra_charges['Type']}}</td>
                <td> Rs.{{ number_format($extra_charges->Amount, 2) }}</td>
                <td>{{$extra_charges['Description']}}</td>  
                <td>
                            @if(Auth::user()->can('view-charge-information', App\Models\extra_charge::class))
                                <a href="/ExtrachargeInformation/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="eye"></span></a>
                            @endif
                            @if(Auth::user()->can('edit-charge', App\Models\extra_charge::class))
                                <a href= "/UpdateChargers/{{$extra_charges['ExtraChargeID']}}" style="margin:2px" class="text-my-own-color"><span data-feather ="edit"></span></a>                               
                            @endif
                            
              </tr>
            @endforeach
            </tbody>
          </table>
          </div>
          <br>
          <br>
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