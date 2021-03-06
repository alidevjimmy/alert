<?php

Route::get('/' , function () {return redirect('/login');});
Route::get('/login' , 'Admin\AdminController@loginForm')->name('login.form');
Route::post('/login' , 'Admin\AdminController@login')->name('login');
Route::group([
    'prefix' => '/admin',
    'middleware' => 'auth:admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
] , function () {
    Route::get('/' , 'AdminController@index')->name('index');
    Route::get('/index' , 'AdminController@index')->name('index');
    Route::get('/changepass' , 'AdminController@changePassForm')->name('changePassForm');
    Route::post('/changepass' , 'AdminController@changePass')->name('changePass');
    Route::resource('/voices' , 'VoiceController');
    Route::resource('/notifications' , 'NotificationController');
    Route::get('logout' , 'AdminController@logout')->name('logout');
});
