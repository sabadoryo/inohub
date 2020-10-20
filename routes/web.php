<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('organizations', 'OrganizationsController@index');


});

Route::get('page-1', function(){
    return view('page-1');
});

Route::get('page-2', function(){
    return view('page-2');
});
