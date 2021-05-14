@extends('layouts.app')
@section('title','Estimated Quotation/Invoice')
@section('header','View Quotation/Invoice')
@section('content')
    <html>
        <head>
            <style>
                @page {
                bleed: 1cm;
                size: A4 portrait;
                size:  auto;  
                margin-bottom: 50pt;
                font-size: 12pt;
                #content, #page {
                width: 100%;
                margin: 0;
                float: none;
                }
                }
                @media print {  
                table{
                page-break-inside: auto;
                }
                tr.last-row {
                background-color: #555!important;
                }
                tr.last-row > th, tr.last-row > td {
                background-color: unset!important;
                }
                div.page-break{
                page-break-before: auto;
                }
                }
                .gray{
                color: #333;
                }
                .gray-ish{
                color: #666;
                }
                .almost-gray{
                color: #999;
                }
                body{
                background-color: #eee;
                -webkit-print-color-adjust: exact !important;
                height: 100%;
                }
                div.container{
                background-color: white;
                border-radius: 25px;
                height: 100%;
                position: relative;
                margin-top: 50px;
                }
                div.invoice-header > div > h1{
                font-size: 4rem;
                }
                div.invoice-table{
                border-top: 3px solid rgb(255, 77, 77);
                }
                div.invoice-table > table.table > thead, div.invoice-table > table.table > thead.thead > tr, div.invoice-table > table.table > thead.thead > tr > th {
                border-top: none;
                }
                div.total-field{
                position: relative;
                }
                h5.due-date{
                position: absolute;
                bottom: 10px;
                right: 15px;
                }
                div.sub-table{
                border-left: 3px solid rgb(255, 77, 77);
                padding-left: 0;
                }
                div.sub-table > table{
                padding-bottom: 0;
                margin-bottom: 0;
                }
                tr.last-row{
                margin-top: 25px;
                background-color: #555;
                color: white;
                border-top: 3px solid rgb(255, 77, 77);
                }
                td,th{
                font-size: 16px;
                }
                p.footer{
                bottom: 0;
                width: 100%;
                background-color: #333;
                color: white;
                padding-top: 15px;
                border-top: 3px solid red;
                }
            </style>
        </head>
        <body> 
        @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @foreach ($orders as $ord)
                <div class="container">
                    <div class="row invoice-header px-3 py-4">
                        <div class="col-12 text-center">
                            <h2 class="Name">Winsoft Holdings (Pvt) Ltd.</h2>
                            <h5>No.95, Galle Road, Moratuwa</h5>
                            <h6>Tel : +(94) 112 605 731</h6>
                            <h6>E-mail :<a href="mailto:winsoft@winsoftlk.com"> winsoft@winsoftlk.com </a></h6>
                            <hr>
                            <h2 class="Name">{{ $ord->Status }}</h2>
                        </div> 
                    </div>
                    <div class="invoice-content row px-5 pt-5">
                        <div class="col-sm-6">
                            <h5 class="almost-gray mb-3">Invoiced To:</h5>
                            <h4 class="to"><b>{{ $ord->CustomerName }}</b></h4>
                            <h6 class="address">{{ $ord->Address }}</h6>
                            <h6 class="mobile">{{ $ord->MobileNo }}</h6>
                            <h6 class="email">{{ $ord->Email }}</h6>
                        </div>
                        <div class="col-sm-6 text-right total-field float-sm-left">
                            <h4 class="almost-gray">Order No : </h4>
                            <h1 class="gray-ish;color:#233556"># {{ $ord->OrderID }}</h1>
                            <h5 class="almost-gray due-date">
                                Due Date: {{$ord->Due_date}}<br>
                                Date of Invoice: {{ $ord->Created_at }}
                            </h5>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-10 offset-1 invoice-table pt-1">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead splitForPrint">
                                        <tr>
                                            <th>#</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Sub Total</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0; ?>
                                    @foreach($orders as $ord)
                                        <tr>
                                            <th></th>
                                            <td>{{ $ord->ProductName }} </td>   
                                            <td style="text-align: right">{{ number_format ($ord->Price) }} </td>   
                                            <td style="text-align: right">{{ $ord->Qty }} </td>   
                                            <td style="text-align: right">{{ number_format ($ord->Price * $ord->Qty) }} </td>                                       
                                            <?php $total = $total + ($ord->Price * $ord->Qty); ?> 
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2"><b>Total Amount</b></td>
                                            <td style="text-align: right"><b><?php echo number_format  ($total)."<br>"; ?>
                                        </tr> 
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2"> (-) Discount</td>
                                            <td style="text-align: right">{{ number_format ($ord->Discount) }}</td>
                                        </tr>                                                        
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2" > (-) Advance</td>
                                            <td style="text-align: right">{{ number_format ($ord->Advance) }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2"><b>Balance</b></td>
                                            <td style="text-align: right"><b>{{ number_format ($total - $ord->Discount - $ord->Advance) }}</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="text-right">
                    @foreach ($orders as $orders)    
                        <a class="btn btn-primary" href="http://127.0.0.1:8000/PDF/{{$orders->OrderID}}">Save as PDF</a> 
                        <a class="btn btn-primary" href="http://127.0.0.1:8000/emails/{{$orders->OrderID}}">E-mail</a> 
                        <a class="btn btn-primary" id="printPageButton" onclick="window.print()">Print</button></a>   
                    @break 
                    @endforeach
                </div>
                @break
            @endforeach
        </body>
    </html>
@endsection