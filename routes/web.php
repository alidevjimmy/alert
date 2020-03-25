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
    Route::resource('/voices' , 'VoiceController');
    Route::get('logout' , 'AdminController@logout')->name('logout');
});
//Route::get('/test' , function () {
//   \App\Admin::create([
//       'email' => 'admin@admin.com',
//       'password' => \Illuminate\Support\Facades\Hash::make('password')
//   ]) ;
//   return 'ok';
//});
