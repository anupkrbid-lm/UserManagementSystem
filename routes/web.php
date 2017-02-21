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

Route::get('/login/admin','AdminsController@index')->name('admin');

Route::get('/test', function () {
    return view('ums_home');
});
Route::get('/', function () {
    return view('home');
})->name('home');

// Route::post('/login/admin',[
// 	'uses' => 'AdminsController@index',
// 	'as' => 'app.admin',
// 	])->name('admin');


// Route::get('/test', function () {
//     return view('index');
// });


