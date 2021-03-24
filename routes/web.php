<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\charge\ChargeController;
use App\Http\Controllers\OrdersController;


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
Route::resource('roles','App\Http\Controllers\Admin\RoleController');
Route::get('/Dashboard','App\Http\Controllers\OrdersController@dashboard');

//user management

Route::get('/viewuser','App\Http\Controllers\Admin\UserController@index');
Route::get('admin/users/edit/{EmpID}','App\Http\Controllers\Admin\UserController@edit')->name('editUser');
Route::post('edit/{EmpID}','App\Http\Controllers\Admin\UserController@update');
Route::post('delete/{EmpID}','App\Http\Controllers\Admin\UserController@destroy');
Route::get('assignRole/{EmpID}','App\Http\Controllers\Admin\UserController@assignRole');
Route::post('assignRole',[App\Http\Controllers\Admin\UserController::class,'addrole']);

//Route::get('/deleteUser/{EmpID}','App\Http\Controllers\Admin\UserController@destroy');

//Role Management

Route::resource('roles','App\Http\Controllers\Admin\RoleController');
Route::get('/View-Role','App\Http\Controllers\Admin\RoleController@index');
Route::get('/Create-Role','App\Http\Controllers\Admin\RoleController@create');
Route::post('roles','App\Http\Controllers\Admin\RoleController@store')->name('role.store');
Route::get('roleedit/{RoleID}','App\Http\Controllers\Admin\RoleController@roleedit'); 
Route::post('roleedit',[App\Http\Controllers\Admin\RoleController::class,'roleupdate']);

Route::get('viewpriviledge/{RoleID}','App\Http\Controllers\Admin\RoleController@viewpriviledge');
Route::post('viewpriviledge',[App\Http\Controllers\Admin\RoleController::class,'addpriviledge']);

//chats
Route::get('/chats', function () {
    return view('chat/chat');
});

//order

Route::resource('orders', OrdersController::class);
Route::get('index', [App\Http\Controllers\OrdersController::class,'index']);
Route::get('create', [App\Http\Controllers\OrdersController::class,'create']);
Route::get('edit', [App\Http\Controllers\OrdersController::class,'edit']);
Route::get('show', [App\Http\Controllers\OrdersController::class,'show']);
Route::get('view', [App\Http\Controllers\OrdersController::class,'view']);
Route::get('joincustomers', [App\Http\Controllers\OrdersController::class,'joincustomers']);
Route::get('joinorddetails', [App\Http\Controllers\OrdersController::class,'joinorddetails']);
Route::get('emails', [App\Http\Controllers\OrdersController::class,'emails']);
Route::get('progressedit/{OrderID}',[App\Http\Controllers\OrdersController::class,'progressedit']);
Route::post('progressedit',[App\Http\Controllers\OrdersController::class,'progressupdate']);
Route::get('delete',[App\Http\Controllers\Product\ProductController::class,'delete']);
//Route::get('find', [OrdersController::class,'findorder']);



Route::get('/addproduct', function () {
    return view('product/addproduct');
});
Route::post('/addproduct',[App\Http\Controllers\Product\ProductController::class,'AddProduct']);
Route::get('product/viewproduct',[App\Http\Controllers\Product\ProductController::class,'ViewProduct']);
Route::get('/UpdateProducts/{ProductID}',[App\Http\Controllers\Product\ProductController::class,'UpdateProducts']);
Route::post('/Updateproducts',[App\Http\Controllers\Product\ProductController::class,'ShowUpdatesProducts']);
Route::get('/Search_Products',[App\Http\Controllers\Product\ProductController::class,'SearchProducts']);
Route::get('/ProductCount',[App\Http\Controllers\Product\ProductController::class,'ProductCount']);
Route::get('/Delete_Products/{ProductID}',[App\Http\Controllers\Product\ProductController::class,'deleteproducts']);
Route::get('/StockoutProducts',[App\Http\Controllers\Product\ProductController::class,'stockOut']);
Route::get('/InStockProducts',[App\Http\Controllers\Product\ProductController::class,'instock']);
Route::get('/Not_AvailableProducts',[App\Http\Controllers\Product\ProductController::class,'notavailable']);



Route::get('/addNote', function () {
    return view('notes/createnote');
});
Route::post('/addNote',[App\Http\Controllers\NoteController::class,'AddNote']);
Route::get('/note/viewnote',[App\Http\Controllers\NoteController::class,'ViewNote']);
Route::get('/UpdateNote/{NoteID}',[App\Http\Controllers\NoteController::class,'UpdateNote']);
Route::post('/UpdateNote',[App\Http\Controllers\NoteController::class,'ShowUpdatesNotes']);
Route::get('/DeleteNote/{NoteID}',[App\Http\Controllers\NoteController::class,'deleteNote']);




Route::get('/addCustomer', function () {
    return view('customer/addcustomer');
});
Route::post('/addCustomer',[App\Http\Controllers\Customer\CustomerController::class,'AddCustomer']);
Route::get('/editCustomer/{CustomerID}',[App\Http\Controllers\Customer\CustomerController::class,'UpdateCustomers']);
Route::post('/editcustomers',[App\Http\Controllers\Customer\CustomerController::class,'ShowUpdatesCustomers']);
Route::get('/deleteCustomer/{CustomerID}',[App\Http\Controllers\Customer\CustomerController::class,'DeleteCustomers']);
Route::get('/Search_Customers',[App\Http\Controllers\Customer\CustomerController::class,'SearchCustomers']);
Route::get('/ViewCustomers',[App\Http\Controllers\Customer\CustomerController::class, 'ViewCustomers']);
Route::get('/CustomerCount',[App\Http\Controllers\Customer\CustomerController::class,'CustomerCount']);



Route::get('/addChargers', function () {
    return view('Charge/addcharge');
});
Route::post('/addChargers',[App\Http\Controllers\charge\ChargeController::class,'AddExtraChargers']);
Route::get('/ViewChargers',[App\Http\Controllers\charge\ChargeController::class,'ViewChargers']);
Route::post('/updateChargers',[App\Http\Controllers\charge\ChargeController::class,'ShowUpdateExtraChargers']);
Route::get('/UpdateChargers/{ExtraChargeID}',[App\Http\Controllers\charge\ChargeController::class, 'UpdateChargers']);
Route::get('/Search_Chargers',[App\Http\Controllers\charge\ChargeController::class,'SearchChargers']);



Route::resource('tasks','App\Http\Controllers\TaskController');
Route::get('/View-Task','App\Http\Controllers\TaskController@index');
Route::get('/View-Task/edit/{TaskID}','App\Http\Controllers\TaskController@edit')->name('editTask'); 
Route::get('/Create-Task','App\Http\Controllers\TaskController@create');
Route::post('store','App\Http\Controllers\TaskController@store')->name('task.store');
Route::post('edit','App\Http\Controllers\TaskController@update');
Route::get('/Select-Order','App\Http\Controllers\OrdersController@selectorder');
// Route::get('/addtask/{OrderID}','App\Http\Controllers\TaskController@create' );