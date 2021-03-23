@extends('layouts.app')
@section('title','Update Progress')
@section('header','Update Progress')
@section('content')
        <div class="container">
        <br>
        <form method="POST" action="/progressedit" id="myform">
            @csrf
            <label for="OrderID" ><b>Order ID : </b></label>
            <input type="text" name="OrderID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$orders->OrderID}}" readonly>
            <br>
            <label for="CustomerID" ><b>Customer ID : </b></label>
            <input type="text" name="ServicePersonID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$orders->CustomerID}}" readonly>
            <br>
            <label for="Due_Date" ><b>Due Date for Payment : </b></label>
            <input type="date" name="Due_Date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$orders->Due_date}}" readonly>
            <br>
            <label for="Progress"><b>Progress : </b></label>
            <select name="Progress" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <option value="{{$orders->Progress}}" selected hidden>{{$orders->Progress}}</option>
                <option value="Order Confirmed">Order Confirmed</option>
                <option value="Advance Payment Done">Advance Payment Done</option>
                <option value="Order Completed">Order Completed</option>
                <option value="Pre-Site Visit Done">Pre-Site Visit Done</option>
                <option value="Site Visit Done">Site Visit Done</option>
                <option value="Order Canceled">Order Canceled</option>
            </select>
            <br>
            <!-- <label for="Description" ><b>Description : </b></label>
            <textarea name="Description" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" rows="5" cols="50" >{{$orders->Description}}</textarea>
            <br> -->
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" ><a href="/index" class="text-my-own-color">Cancel</a></button>
            </div>
            
        </form>
        </div>

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
                        You are going to update the details of Task ID {{$orders->OrderID}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
@endsection