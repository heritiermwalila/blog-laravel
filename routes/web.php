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






Route::group(['middleware' => 'web'], function() {
    //

    Route::get('/', function () {
        return view('welcome');
    
    });

    

    
    
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    //
    Route::resource('/admin/users', 'AdminUsersController');
    Route::get('/admin', function(){

        if(Auth::check()){

            return view('admin.index');
        }
        return redirect('/admin');
    });

    

    Route::get('/home', 'HomeController@index')->name('home');
});



