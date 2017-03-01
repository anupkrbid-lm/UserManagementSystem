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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/getstarted','AuthsController@index');

Route::post('/register', [
	'uses' => 'AuthsController@register',
	'as' => 'app.register'
]);

Route::post('/login', [
    'uses' => 'AuthsController@login',
    'as' => 'app.login'
]);

Route::post('/verify-password', [
    'uses' => 'AuthsController@verifyPassword',
    'as' => 'app.post.verifyPassword'
]);

Route::put('/change-password', [
    'uses' => 'AuthsController@changePassword',
    'as' => 'app.put.changePassword'
]);

Route::patch('/change-password', [
    'uses' => 'AuthsController@changePassword',
    'as' => 'app.patch.changePassword'
]);

Route::post('/logout', [
    'uses' => 'AuthsController@logout',
    'as' => 'app.logout'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [
        'uses' => 'AdminsController@dashboard',
        'as' => 'admin.get.dashboard'
    ]);
    Route::get('profile', [
        'uses' => 'AdminsController@profile',
        'as' => 'admin.get.profile'
    ]);
    Route::group(['prefix' => 'manage'], function () {
        /** User CRUD resources */
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [
                'uses' => 'AdminsController@allUsers',
                'as' => 'admin.get.allUsers'
            ]);
            Route::get('add', [
                'uses' => 'AdminsController@addUser',
                'as' => 'admin.get.addUser'
            ]);
            Route::post('create', [
                'uses' => 'AdminsController@createUser',
                'as' => 'admin.post.createUser'
            ]);
            Route::get('view/{id}', [
                'uses' => 'AdminsController@viewUser',
                'as' => 'admin.get.viewUser'
            ]);
            Route::get('edit/{id}', [
                'uses' => 'AdminsController@editUser',
                'as' => 'admin.get.editUser'
            ]);
            Route::put('update/{id}', [
                'uses' => 'AdminsController@updateUser',
                'as' => 'admin.put.updateUser'
            ]);
            Route::patch('update/{id}', [
                'uses' => 'AdminsController@updateUser',
                'as' => 'admin.patch.updateUser'
            ]);
            Route::delete('delete/{id}', [
                'uses' => 'AdminsController@deleteUser',
                'as' => 'admin.delete.deleteUser'
            ]);
        });
        /** Manage CMS System */
        Route::group(['prefix' => 'cms'], function () {
            Route::get('/welcome-title', [
                'uses' => 'AdminsController@welcomeTitle',
                'as' => 'admin.get.welcomeTitle'
            ]);
            Route::get('/portfolio', [
                'uses' => 'AdminsController@portfolio',
                'as' => 'admin.get.portfolio'
            ]);
            Route::get('/about-us', [
                'uses' => 'AdminsController@aboutUs',
                'as' => 'admin.get.aboutUs'
            ]);
        });
    });
});


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('profile', [
        'uses' => 'UsersController@profile',
        'as' => 'user.get.profile'
    ]);
});



Route::get('/test', function () {
    return view('user.index');
});

Route::get('/testing', function () {
    return view('user.profile');
});
