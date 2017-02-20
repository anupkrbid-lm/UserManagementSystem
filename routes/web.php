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


Route::get('/','StartsController@website')->name('home');
Route::get('/getstarted','AuthsController@index');

Route::post('/register', [
	'uses' => 'AuthsController@register',
	'as' => 'app.register'
]);

Route::post('/login', [
	'uses' => 'AuthsController@login',
	'as' => 'app.login'
]);


// Route::get('/test', function () {
//     return view('index');
// });


