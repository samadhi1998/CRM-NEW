@extends('layouts.app')
@section('title','Update Charge')
@section('content')

<div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Update Charges') }}</div>
              <div class="card-body">
        <div class="container"  style="background :none !important ">

        <!-- @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
        <form method="POST" action="/updateChargers"id="myformcharge">
            @csrf
            <label for="ExtraChargeID" ><b> ExtraCharge ID: </b></label>
            <input type="text" name="ExtraChargeID" value="{{$data['ExtraChargeID']}}" required>
            <br>
            <label for="OrderID" ><b> Order ID : </b></label>
            <input type="text" name="OrderID" value="{{$data['OrderID']}}" required>
            <br>
            <label for="ServicePersonID" ><b>ServicePerson ID : </b></label>
            <input type="text" name="ServicePersonID" value="{{$data['ExtraChargeID']}}" required>
            <br>
            <label for="Type"><b>Type : </b></label>
            <select  name="Type">
            <option value="{{$data['Type']}}" selected hidden>{{$data['Type']}}</option>
                <option value="ExtraCharge">Extra Charge</option>
                <option value="ServiceCharge">Service Charge</option>
            </select>
            <br>
            <label for="Amount" ><b>Amount : </b></label>
            <input type="number" name="Amount" value="{{$data['Amount']}}"  required>
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea  name="Description" required>{{$data['Description']}}</textarea>
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" class="btn btn-primary" ><a href="/ViewChargers">Cancel</a></button>
            </div>     
            </form>
        </div>
        </div>
        </div></div></div></div>

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
                        You are going to update the order details of charge ID . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myformcharge" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>      
@endsection