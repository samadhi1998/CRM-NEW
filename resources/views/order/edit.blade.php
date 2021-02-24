@extends('layouts.app')

@section('content')<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Update Employee Details</title>
        <style>
            button {
                background-color: white;
                color: #233554;
                border-radius: 40px;
                margin: auto;
                display: block;
                float: right;
            }
            label{
                color: #233554;
            }
            option{
                color: #233554;
            }
            form{
                margin-left: auto;
                margin-right: auto;
                border: 2px;
            }
            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 40px;
                width: 50%;
                margin-left: auto;
                margin-right: auto;
            }
            .text-my-own-color {
                color: #233554 !important; 
            }
            a:hover {
                text-decoration: none;
            }
            a:active {
                text-decoration: none;
            }
            .btn-primary {
                background-color: #233554 !important;
                color: white !important; 
                border-color: white !important;
                border-radius: 40px !important;
            }
            .btn-secondary {
                background-color: white !important;
                color: #233554 !important; 
                border-color: #233554 !important;
                border-radius: 40px !important;
            }
        </style>  
    </head>
    <body>
        <h1 style="text-align: center; color:#233554">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">Update Order Details</h2>
        <hr style="background-color:#233554; height: 5px">
        <br>
        <div class="container">
        <form method="POST" action="/edit" id="myform">
            @csrf
            <label for="Progress"><b>Progress : </b></label>
            <select  name="Progress" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <option value="" selected disabled hidden></option>
                <option value="Estimated Quotation">Estimated Quotation</option>
                <option value="Order Confirmed">Order Confirmed</option>
                <option value="Invoice">Invoice</option>
            </select>
            <label for="Due_date" ><b>Due_date : </b></label>
            <input type="date" name="Due_date" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="TaskID" ><b>TaskID : </b></label>
            <input type="text" name="TaskID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="CustomerCareID" ><b>CustomerCareID : </b></label>
            <input type="text" name="CustomerCareID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="QuotationEmpID" ><b>QuotationEmpID : </b></label>
            <input type="text" name="QuotationEmpID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <label for="FollowUpID" ><b>FollowUpID : </b></label>
            <input type="text" name="FollowUpID" required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
            <br>
            <br>
            <div class="btn-group float-right" role="group">
            <button type="button" data-toggle="modal" class="btn btn-primary" data-target="#exampleModal" >Update</button>
            </div>
            <div class="btn-group float-right mr-2 " role="group">
            <button type="submit" class="btn btn-primary" ><a href="/View-User">Cancel</a></button>
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
                        You are going to update the order details of Order ID  . Do you want to continue ?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="submit" form="myform" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
@endsection