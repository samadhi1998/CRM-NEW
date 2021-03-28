@extends('layouts.app')
@section('title','Customer Information')
@section('content')

<div class="container" style="background :none !important ">
<div class="row justify-content-center">
<div class="col-md">
<div class="card">
<div class="card-header">{{ __('Customer Informations') }}</div>
<div class="card-body">
</br>

    <div class="pull-right" style="text-align: right;color:blue">
    <a href="/addCustomer" class="btn btn-primary">Back to Add Customer</a>
    </div>

<br>
<br>
                            
                <form method="post"  action="check" autocomplete="off">
                   @csrf
                <label class="form-control-label" for="input-name ">Customer Order Details</label>
                    <select name="CustomerID" id="input-category" class="form-select form-control-alternative{{ $errors->has('Name') ? ' is-invalid' : '' }}" required>
                            
                         @foreach ($customers as $customer)
                           @if($customer['CustomerID'] == old('customer'))
                            <option value="{{$customer['CustomerID']}}" selected>{{$customer['Name']}} - {{$customer['MobileNo']}}</option>
                           @else
                            <option value="{{$customer['CustomerID']}}">{{$customer['Name']}} - {{$customer['MobileNo']}}</option>
                           @endif
                        @endforeach 

                    </select>
<br>
<br>
                 <div class="text-right">
                 <button type="submit"  Value="Continue" class="btn btn-primary">Continue</button>	 			
                 </div>
                 </form>

</div>
</div>
</div>
</div>
</div>
</div>

@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush