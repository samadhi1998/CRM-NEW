<?php





Route::get('/', 'createcontroller@home');
Route::get('/add', function(){
	return view('add');
});

Route::POST('/insert', 'createcontroller@add');
Route::get('/update/{id}', 'createcontroller@update');
Route::get('/edit/{id}', 'createcontroller@edit');
Route::get('/read/{id}', 'createcontroller@read');
Route::get('/delete/{id}', 'createcontroller@delete');