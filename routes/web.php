<?php

use Illuminate\Support\Facades\Route;
use Spatie\GoogleCalendar\Event;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/wait', function () {
    return view('auth/wait');
});


Auth::routes();

//Dashboard Route

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Notification Routes

Route::get('/mark-as-read', [App\Http\Controllers\HomeController::class, 'markNotification'])->name('markNotification');
Route::get('/mark-all-as-read', [App\Http\Controllers\HomeController::class, 'markAllNotification'])->name('markAllNotification');


Route::resource('/admin/users','App\Http\Controllers\Admin\UserController');
Route::resource('roles','App\Http\Controllers\Admin\RoleController');

//user management Routes

Route::get('/viewuser','App\Http\Controllers\Admin\UserController@index');
Route::get('admin/users/edit/{EmpID}','App\Http\Controllers\Admin\UserController@edit')->name('editUser');
Route::post('edit/{EmpID}','App\Http\Controllers\Admin\UserController@update');
Route::get('/deleteuser/{EmpID}','App\Http\Controllers\Admin\UserController@deleteuser');
Route::get('assignRole/{EmpID}','App\Http\Controllers\Admin\UserController@assignRole');
Route::post('assignRole',[App\Http\Controllers\Admin\UserController::class,'addrole']);
Route::get('/Search_Users',[App\Http\Controllers\Admin\UserController::class,'searchUser']);

//Role Management routes

Route::resource('roles','App\Http\Controllers\Admin\RoleController');
Route::get('/View-Role','App\Http\Controllers\Admin\RoleController@index');
Route::get('/Create-Role','App\Http\Controllers\Admin\RoleController@create');
Route::post('roles','App\Http\Controllers\Admin\RoleController@store')->name('role.store');
Route::get('roleedit/{RoleID}','App\Http\Controllers\Admin\RoleController@roleedit'); 
Route::post('roleedit',[App\Http\Controllers\Admin\RoleController::class,'roleupdate']);
Route::get('/deleteRole/{RoleID}','App\Http\Controllers\Admin\RoleController@deleteRole');
Route::get('viewpriviledge/{RoleID}','App\Http\Controllers\Admin\RoleController@viewpriviledge');
Route::post('viewpriviledge',[App\Http\Controllers\Admin\RoleController::class,'addpriviledge']);

//chats
Route::get('/chats', function () {
    return view('chat/chat');
});

//Order Routes

Route::resource('orders', OrdersController::class);
Route::get('/index', [App\Http\Controllers\OrdersController::class,'index']);
Route::get('/create', [App\Http\Controllers\OrdersController::class,'create']);
Route::get('edit/{OrderID}', [App\Http\Controllers\OrdersController::class,'edit']);
Route::post('edit', [App\Http\Controllers\OrdersController::class,'update']);
Route::get('show', [App\Http\Controllers\OrdersController::class,'show']);
Route::get('view', [App\Http\Controllers\OrdersController::class,'view']);
Route::get('emails', [App\Http\Controllers\OrdersController::class,'emails']);
Route::get('progressedit/{OrderID}',[App\Http\Controllers\OrdersController::class,'progressedit']);
Route::post('progressedit',[App\Http\Controllers\OrdersController::class,'progressupdate']);
Route::get('vieworddetails/{OrderID}', [App\Http\Controllers\OrdersController::class,'vieworddetails']);
Route::get('delete/{OrderID}',[App\Http\Controllers\OrdersController::class,'delete']);
Route::get('/SearchOrder',[App\Http\Controllers\OrdersController::class,'SearchOrder']);
Route::get('deleteorder/{OrderID}',[App\Http\Controllers\OrdersController::class,'destroy']);



//Report Routes

Route::get('salesreport', [App\Http\Controllers\ReportController::class, 'salesreport'])->name('report');
Route::get('bydaily', [App\Http\Controllers\ReportController::class, 'bydaily'])->name('report.bydaily');
Route::get('byweekly', [App\Http\Controllers\ReportController::class, 'byweekly'])->name('report.byweekly');
Route::get('bymonthly', [App\Http\Controllers\ReportController::class, 'bymonthly'])->name('report.bymonthly');
Route::get('monthwise', [App\Http\Controllers\ReportController::class, 'monthwise'])->name('report.monthwise');
Route::get('premonth', [App\Http\Controllers\ReportController::class, 'premonth'])->name('report.premonth');
Route::get('test', [App\Http\Controllers\ReportController::class, 'test'])->name('report.test');

//Email Routes

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'From buyabc@abcgroup.com',
    ];
   
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});


//pdf

Route::get('pdf-download', [App\Http\Controllers\PDFController::class, 'downloadPDF']);


//Products Routes

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
Route::get('/ReOrderProducts',[App\Http\Controllers\Product\ProductController::class,'ReorderProducts']);
Route::get('/InStockProducts',[App\Http\Controllers\Product\ProductController::class,'instock']);
Route::get('/notAvailableProducts',[App\Http\Controllers\Product\ProductController::class,'notavailable']);
Route::get('ProductInformation/{ProductID}',[App\Http\Controllers\Product\ProductController::class,'ProductInfo']);
Route::get('productCount',[App\Http\Controllers\Product\ProductController::class,'ProductCount']);

//Note Routes

Route::get('/addNote', function () {
    return view('notes/createnote');
});
Route::post('/addNote',[App\Http\Controllers\NoteController::class,'AddNote']);
Route::get('/note/viewnote',[App\Http\Controllers\NoteController::class,'index']);
Route::get('/UpdateNote/{NoteID}',[App\Http\Controllers\NoteController::class,'UpdateNote']);
Route::post('/UpdateNote',[App\Http\Controllers\NoteController::class,'ShowUpdatesNotes']);
Route::get('/DeleteNote/{NoteID}',[App\Http\Controllers\NoteController::class,'deleteNote']);
Route::get('/Search_Notes',[App\Http\Controllers\NoteController::class,'searchNotes']);

//Customer Routes

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
Route::get('/searchordercustomer',[App\Http\Controllers\Customer\CustomerController::class,'index']);
Route::post('/checkcustomers',[App\Http\Controllers\Customer\CustomerController::class,'customerorder']);

//Charge Routes

Route::get('/addChargers/{id}',[App\Http\Controllers\charge\ChargeController::class,'Addcharge']);
Route::post('/addChargers',[App\Http\Controllers\charge\ChargeController::class,'AddExtraChargers']);
Route::get('/ViewChargers',[App\Http\Controllers\charge\ChargeController::class,'ViewChargers']);
Route::post('/updateChargers',[App\Http\Controllers\charge\ChargeController::class,'ShowUpdateExtraChargers']);
Route::get('/UpdateChargers/{ExtraChargeID}',[App\Http\Controllers\charge\ChargeController::class, 'UpdateChargers']);
Route::get('/Search_Chargers',[App\Http\Controllers\charge\ChargeController::class,'SearchChargers']);
Route::get('ExtrachargeInformation/{OrderID}',[App\Http\Controllers\charge\ChargeController::class,'ChargeInfo']);

//Task Routes

Route::resource('tasks','App\Http\Controllers\TaskController');
Route::get('/View-Task','App\Http\Controllers\TaskController@index');
Route::get('/View-Task/editTask/{TaskID}','App\Http\Controllers\TaskController@edit')->name('editTask'); 
Route::get('/Create-Task','App\Http\Controllers\TaskController@create');
Route::post('store','App\Http\Controllers\TaskController@store')->name('task.store');
Route::post('editTask','App\Http\Controllers\TaskController@update');
Route::get('/Select-Order','App\Http\Controllers\OrdersController@selectorder');
Route::get('/deleteTask/{TaskID}','App\Http\Controllers\TaskController@deleteTask');
Route::get('/completeTask/{TaskID}','App\Http\Controllers\TaskController@completeTask');
Route::get('/Search_Tasks',[App\Http\Controllers\TaskController::class,'searchTasks']);
Route::get('addtask/{OrderID}','App\Http\Controllers\TaskController@create');
Route::post('addtask',[App\Http\Controllers\TaskController::class,'store']);
Route::get('TaskInformation/{TaskID}',[App\Http\Controllers\TaskController::class,'jointasks']);
Route::get('taskChangeStatus', [App\Http\Controllers\TaskController::class,'taskChangeStatus']);

//Reminder Routes

Route::resource('/reminder','App\Http\Controllers\EventController');
Route::post('addeventurl/store','App\Http\Controllers\EventController@store')->name('addevent.store');
Route::get('/view-reminder','App\Http\Controllers\EventController@show');
Route::get('deleteeventurl','App\Http\Controllers\EventController@show');
Route::get('editeventurl/update/{id}','App\Http\Controllers\EventController@edit');
Route::post('/editeventurl','App\Http\Controllers\EventController@update');
Route::get('deleteeventurl/{id}','App\Http\Controllers\EventController@destroy');
Route::get('/Search_Reminders',[App\Http\Controllers\EventController::class,'searchReminders']);

//chat
Route::get('/chat/message','App\Http\Controllers\ChatController@index');
Route::get('/message/{id}', [App\Http\Controllers\ChatController::class, 'getMessage'])->name('chatGetMessage');
Route::post('/sendmessage', [App\Http\Controllers\ChatController::class, 'sentMessage'])->name('sentMessage');

//notification
Route::get('/view-notifications','App\Http\Controllers\NotificationsController@index');
