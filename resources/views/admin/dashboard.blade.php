@extends('layouts.app')
@section('title','Dashboard')
@section('header','Dashboard')
@section('content')
<div class="page-wrapper">
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-3">
                        <div class="card">
                          <div class="row no-gutters">
                          <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Orders</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> 20</h2>
                                    <span class="text-muted">Daily Orders</span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4 d-flex align-self-center"><span data-feather = "shopping-cart" style="width: 70px; height: 70px" class="text-my-own-color" ></span></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-sm-3">
                        <div class="card">
                          <div class="row no-gutters">
                          <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Customers</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> 20</h2>
                                    <span class="text-muted">Daily Customers</span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4 d-flex align-self-center"><span data-feather = "users" style="width: 70px; height: 70px" class="text-my-own-color"></span></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                     <!-- Column -->
                    <!-- Column -->
                    <div class="col-sm-3">
                        <div class="card">
                          <div class="row no-gutters">
                          <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Tasks</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> 20</h2>
                                    <span class="text-muted">Daily Tasks</span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4 d-flex align-self-center"><span data-feather = "target" style="width: 70px; height: 70px" class="text-my-own-color"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                          <div class="row no-gutters">
                          <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Products</h4>
                                <div class="text-end">
                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> 20</h2>
                                    <span class="text-muted">Active Products</span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4 d-flex align-self-center"><span data-feather = "package" style="width: 70px; height: 70px" class="text-my-own-color"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <!-- ============================================================== -->
                <!-- Orders -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <h4 class="card-title col-md-10 mb-md-0 mb-5 align-self-center">Orders</h4>
                                    <!-- <div class="col-md-3 ms-auto">
                                        <select class="form-select shadow-none col-md-15 ml-auto mr-auto">
                                            <option selected>January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                            <option value="3">May</option>
                                            <option value="3">June</option>
                                            <option value="3">July</option>
                                            <option value="3">August</option>
                                            <option value="3">September</option>
                                            <option value="3">October</option>
                                            <option value="3">November</option>
                                            <option value="3">December</option>
                                        </select>
                                    </div> -->
                                </div>
                                <div class="table-responsive mt-5">
                                      <table>
                                          <tr> 
                                              <th>Order ID:</th>
                                              <!-- <th>Customer </th> -->
                                              <th>Date</th>
                                              <th>Due Date</th>
                                              <!-- <th>Advance</th>  -->
                                              <!-- <th>Total Price </th>  -->
                                              <th>Progress</th>         
                                          </tr>
                                          @foreach($orders as $order)
                                          <tr>
                                              <td>{{ $order->OrderID }}</td>
                                              <!-- <td>{{ $order->Name }}</td> -->
                                              <td>{{ $order->created_at }}</td>
                                              <td>{{ $order->Due_date }}</td>
                                              <!-- <td>{{ $order->Advance }}</td> -->
                                              <!-- <td>{{ $order->Total_Price }}</td> -->
                                              <td>{{ $order->Progress }}</td>
                                          </tr>
                                          @endforeach
                                          </table>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex">
                                    <h4 class="card-title col-md-10 mb-md-0 mb-5 align-self-center">Orders of the Month</h4>
                                    <div class="col-md-3 ms-auto">
                                        <select class="form-select shadow-none col-md-5 ml-auto">
                                            <option selected>January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                            <option value="3">May</option>
                                            <option value="3">June</option>
                                            <option value="3">July</option>
                                            <option value="3">August</option>
                                            <option value="3">September</option>
                                            <option value="3">October</option>
                                            <option value="3">November</option>
                                            <option value="3">December</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive mt-5">
                                      <table>
                                          <tr> 
                                              <th>NO:</th>
                                              <!-- <th>Customer </th> -->
                                              <th>Date</th>
                                              <th>Due Date</th>
                                              <!-- <th>Advance</th>  -->
                                              <th>Total Price </th> 
                                              <th>Progress</th>         
                                          </tr>
                                          @foreach($orders as $order)
                                          <tr>
                                              <td>{{ $order->OrderID }}</td>
                                              <!-- <td>{{ $order->CustomerID }}</td> -->
                                              <td>{{ $order->created_at }}</td>
                                              <td>{{ $order->Due_date }}</td>
                                              <!-- <td>{{ $order->Advance }}</td> -->
                                              <td>{{ $order->Total_Price }}</td>
                                              <td>{{ $order->Progress }}</td>
                                          </tr>
                                          @endforeach
                                          </table>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                </div>
                
                </div>
            


@endsection