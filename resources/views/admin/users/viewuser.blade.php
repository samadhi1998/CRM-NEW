@extends('layouts.app') 

@section('content')
<html>
<title>New User</title>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 70%;
        color: #233554;
        margin-left: auto;
        margin-right: auto;
        }

        td, th {
        border: 2px solid #233554;
        text-align: left;
        padding: 8px;
        }

        td:nth-child(1) {
            text-align: center;
        }

        tr:nth-child(even) {
        background-color: #233554;
        color: white; 
        }

        th{
            text-align: center;
        }

        button {
            background-color: white;
            color: #233554;
            border-radius: 40px;
            margin: auto;
            display: block;
            font-weight: bold;
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
      

<div class="card text-center">
        <div class="card-header">
        <h1 style="text-align: center; color:#233554 ">Customer Relationship Management System</h1>
        <h2 style="text-align: center; color:#233554">View and Update Employee Details</h2>
        <hr style="background-color:#233554; height: 5px">
      <br>
        </div>

        <div class="card-body">
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="text-my-own-color" type="submit">Search</button>
            </form>
        </nav>
        
            <div class="container">
                <form method="post" id="form1" action="">
                    <table>
                        <tr>
                            <th>EmpID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>MobileNo</th>
                            <th>EmpType</th>
                            <th>Added By</th>
                            <th>Status</th>
                            <th>Action</th>    
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>P.L.Gunarathna</td>
                            <td>gunarathna@gamil.com</td>
                            <td>Katubedda,Moratuwa</td>
                            <td>0712345678</td>
                            <td>Customer care person</td>
                            <td>P.L.Mahendra</td>
                            <td>Active</td>
                            <td>
                                <div class="btn-group" role="group">
                                <button type="button" data-toggle="modal" data-target="#exampleModal1" >Delete</button>
                                </div>

                                <div class="btn-group" role="group">
                                <button type="button" data-toggle="modal" data-target="#exampleModal2" >Update</button>
                                </div>
                            </td> 
                        </tr>
                    </table>
                </form >    
            </div>        
</div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>  
@endsection