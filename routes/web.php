<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\UserController;

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

//user management

Route::get('/viewuser', function () {
    return view('admin/users/viewuser');
});


Route::get('admin/users/edit/{EmpID}','App\Http\Controllers\Admin\UserController@edit')->name('editUser');
Route::post('edit/{EmpID}','App\Http\Controllers\Admin\UserController@update');
Route::get('/add-priviledge','App\Http\Controllers\Admin\RoleController@index');
Route::post('delete/{EmpID}','App\Http\Controllers\Admin\UserController@destroy');

//Route::get('/deleteUser/{EmpID}','App\Http\Controllers\Admin\UserController@destroy');


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


