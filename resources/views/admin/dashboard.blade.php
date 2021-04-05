@extends('layouts.app')
@section('title','Dashboard')
@section('header','Dashboard')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Column 1-->
            <div class="col-sm-3">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Orders</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ $count }}</h2>
                                    <span class="text-muted">Daily Orders</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-self-center">
                            <span data-feather = "shopping-cart" style="width: 70px; height: 70px" class="text-my-own-color" ></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 2-->
            <div class="col-sm-3">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Customers</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ $count2 }}</h2>
                                    <span class="text-muted">Daily Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-self-center">
                            <span data-feather = "users" style="width: 70px; height: 70px" class="text-my-own-color"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 3-->
            <div class="col-sm-3">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Tasks</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ $count3 }}</h2>
                                    <span class="text-muted">Daily Tasks</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-self-center">
                            <span data-feather = "target" style="width: 70px; height: 70px" class="text-my-own-color"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 4-->
            <div class="col-sm-3">
                <div class="card">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Products</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ $count4 }}</h2>
                                    <span class="text-muted">Active Products</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-self-center">
                            <span data-feather = "package" style="width: 70px; height: 70px" class="text-my-own-color"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>

        <!-- ============================================================== -->
        <!-- Orders & Products -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <h4 class="card-title col-md-10 mb-md-0 mb-5 align-self-center">Orders</h4>
                        </div>
                        <div class="table-responsive mt-4">
                            <table>
                                <tr> 
                                    <th>Order ID:</th>
                                    <th>Date</th>
                                    <th>Due Date</th>
                                    <th>Progress</th>         
                                </tr>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->OrderID }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->Due_date }}</td>
                                    <td>{{ $order->Progress }}</td>
                                </tr>
                                @endforeach
                            </table>
                            <br>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <h4 class="card-title col-md-10 mb-md-0 mb-5 align-self-center">Products</h4>
                        </div>              
                        <div class="table-responsive mt-4">
                            <table>
                                <tr> 
                                    <th>Product Name:</th>
                                    <th>Description</th>
                                    <th>Quantity</th>         
                                </tr>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->Name }}</td>
                                    <td>{{ $product->Description }}</td>
                                    <td>{{ $product->Qty }}</td>
                                </tr>
                                @endforeach
                            </table>
                            <br>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection