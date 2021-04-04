@extends('layouts.app')
@section('title','Search Charge')
@section('header','Search Charges')
@section('content')

<div class="container" style="background :none !important ">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <table>
            <tr>
              <th>Order ID</th>
              <th>ServicePerson ID</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Description</th>
            </tr>
            <tbody>
            @foreach($extra_charge as $extra_charges)
              <tr>                                                
                <th scope="row">{{ $extra_charges['OrderID']}}</th>
                <td>{{$extra_charges['ServicePersonID']}}</td>
                <td>{{$extra_charges['Type']}}</td>
                <td>{{$extra_charges['Amount']}}</td>
                <td>{{$extra_charges['Description']}}</td>     
              </tr>
            @endforeach
            </tbody>
          </table>
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