<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\charge\ChargeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('home');

Route::resource('/admin/users','App\Http\Controllers\Admin\UserController');


//user management

Route::get('/viewuser', function () {
    return view('admin/users/viewuser');
});

//chats
Route::get('/chats', function () {
    return view('chat/chat');
});

//order
Route::get('/index', function () {
    return view('order/index');
});

Route::get('/create', function () {
    return view('order/create');
});

Route::get('/edit', function () {
    return view('order/edit');
});





Route::get('/addproduct', function () {
    return view('product/addproduct');
});
Route::post('/addproduct',[App\Http\Controllers\Product\ProductController::class,'AddProduct']);
Route::get('/viewproduct',[App\Http\Controllers\Product\ProductController::class,'ViewProduct']);
Route::get('/UpdateProducts/{ProductID}',[App\Http\Controllers\Product\ProductController::class,'UpdateProducts']);
Route::post('/Updateproducts',[App\Http\Controllers\Product\ProductController::class,'ShowUpdatesProducts']);



Route::get('/addCustomer', function () {
    return view('customer/addcustomer');
});
Route::post('/addCustomer',[App\Http\Controllers\Customer\CustomerController::class,'AddCustomer']);
Route::get('/editCustomer/{CustomerID}',[App\Http\Controllers\Customer\CustomerController::class,'UpdateCustomers']);
Route::post('/editcustomers',[App\Http\Controllers\Customer\CustomerController::class,'ShowUpdatesCustomers']);
Route::get('/deleteCustomer/{CustomerID}',[App\Http\Controllers\Customer\CustomerController::class,'DeleteCustomers']);
Route::get('/Search_Customers',[App\Http\Controllers\Customer\CustomerController::class,'SearchCustomers']);
Route::get('/ViewCustomers',[App\Http\Controllers\Customer\CustomerController::class, 'ViewCustomers']);



Route::get('/addChargers', function () {
    return view('Charge/addcharge');
});
Route::post('/addChargers',[App\Http\Controllers\charge\ChargeController::class,'AddExtraChargers']);
Route::get('/ViewChargers',[App\Http\Controllers\charge\ChargeController::class,'ViewChargers']);
Route::post('/updateChargers',[App\Http\Controllers\charge\ChargeController::class,'ShowUpdateExtraChargers']);
Route::get('/UpdateChargers/{ExtraChargeID}',[App\Http\Controllers\charge\ChargeController::class, 'UpdateChargers']);
Route::get('/Search_Chargers',[App\Http\Controllers\charge\ChargeController::class,'SearchChargers']);

