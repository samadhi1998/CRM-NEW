@extends('layouts.app')

@section('content')
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add Order Details</title>
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
        <h2 style="text-align: center; color:#233554">Add Order Details</h2>
        <hr style="background-color:#233554; height: 5px"><br>
        <div class="container">
            <form method="POST" action=" ">
                @csrf
                <label for="OrderID" ><b>OrderID : </b></label>
                <input type="text" name="OrderID" required  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <br>   
                <label for="Due_date" ><b>Due_date : </b></label>
                <input type="date" name="Name"  required  required style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                <br>
                <label for="Progress"><b>Progress : </b></label>
                <select  name="Progress" style="background: #ffffff; margin: 5px 0 22px 0; border: none; padding: 10px; width: 100%" >
                    <option value="" selected disabled hidden></option>
                    <option value="Estimated Quotation">Estimated Quotation</option>
                    <option value="Order Confirmed">Order Confirmed</option>
                    <option value="Invoice">Invoice</option>
                </select>
                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button><br><br><br>
                </div>          
            </form>
        </div>
      
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
@endsection