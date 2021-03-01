@extends('layouts.app')
@section('title','Update User')
@section('content')
<br>
        <div class="container">
        <h2 style="text-align: center ;color:#233554">Update User Details</h2>
        <br>
        <form method="POST" action="{{ route('users.update', [$users->EmpID]) }}" id="myform">
            @csrf
            @method('PUT')
            <label for="EmpID" ><b>Emp ID : </b></label>
            <input type="text" name="EmpID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$users->EmpID}}" readonly>
            <br>
            <label for="name" ><b>Emp Name : </b></label>
            <input type="text" name="name" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$users->name}}" >
            <br>
            <label for="email" ><b>Email : </b></label>
            <input type="text" name="email" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$users->email}}" >
            <br>
            <label for="MobileNo" ><b>Mobile No : </b></label>
            <input type="text" name="MobileNo" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$users->MobileNo}}" >
            <br>
            <label for="Address" ><b>Address : </b></label>
            <input type="text" name="Address" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" value="{{$users->Address}}" >
            <br>
            <label for="Role"><b>Role : </b></label>
                <select  name="Position" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                    <option value="Customer Care Person">Customer Care Person</option>
                    <option value="Service Person">Service Person</option>
                    <option value="Quotation Team Member">Quotation Member</option>
                    <option value="Follow Up Person">Follow Up Person</option>
                    <option value="Admin">Admin</option>
                </select>
                <br>
                <label for="Status"><b>Status : </b></label>
                <select  name="Status" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                    <option value="Customer Care Person">Active</option>
                    <option value="Service Person">Leave</option>
                </select>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" ><a href="/admin/users/index" class="text-my-own-color">Cancel</a></button>
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
                        You are going to update the deatils of  {{$users->name}} . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

  
@endsection