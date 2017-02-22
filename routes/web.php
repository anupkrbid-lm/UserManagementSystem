<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/getstarted','AuthsController@index');

Route::post('/register', [
	'uses' => 'AuthsController@register',
	'as' => 'app.register'
]);

Route::post('/login', [
	'uses' => 'AuthsController@login',
	'as' => 'app.login'
]);

Route::get('/admin/dashboard','AdminsController@index')->name('admin');
Route::get('/admin/manage/users','AdminsController@user_manage')->name('admin_user_manage');
Route::delete('/admin/manage/users/delete/{id}','AdminsController@delete');

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::post('/login/admin',[
// 	'uses' => 'AdminsController@index',
// 	'as' => 'app.admin',
// 	])->name('admin');


Route::get('/test', function () {
    return view('layouts.admin');
});


