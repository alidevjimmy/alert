<?php


Auth::routes(['register' => false]);
Route::get('/' , function () {return redirect('/login');});
Route::group([
    'prefix' => '/admin',
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'as' => 'admin.'
] , function () {
    Route::get('/' , 'AdminController@index')->name('index');
});
