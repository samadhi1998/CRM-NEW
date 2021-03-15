@extends('layouts.app')
@section('title','Add Charge')
@section('content')



        <!-- @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}}
          </div>
           @endforeach -->
           <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Add Charges') }}</div>
              <div class="card-body">
        <div class="container"  style="background :none !important ">
        <form method="POST" action="/addChargers">
            @csrf

            
            <label for="OrderID" ><b> Order ID : </b></label>
            <input type="text" name="OrderID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="ServicePersonID" ><b>ServicePerson ID : </b></label>
            <input type="text" name="ServicePersonID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Type"><b>Type : </b></label>
            <select  name="Type" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <option value="" selected disabled hidden></option>
                <option value="ExtraCharge">Extra Charge</option>
                <option value="ServiceCharge">Service Charge</option>
                
            </select>
            <br>
            <label for="Amount" ><b>Amount : </b></label>
            <input type="number" name="Amount" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="Description" ><b>Description : </b></label>
            <textarea  name="Description" required style="background: #ffffff; margin: 15px 0 22px 0; border: none; padding: 10px; width: 100%" ></textarea>
            <br>
            <div class="text-right">
             <button type="submit"  Value="Next"class="btn btn-primary">Submit</button>	 			
              </div>
            </form>
        </div>
        </div></div></div></div>

 

@endsection