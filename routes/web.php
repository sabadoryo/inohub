<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {

    Route::get('organizations', 'OrganizationsController@index');
    Route::get('organizations/create', 'OrganizationsController@create');
    Route::post('organizations', 'OrganizationsController@store');
    Route::get('organizations/{id}', 'OrganizationsController@show');

});

Route::group([
    'prefix' => 'control-panel',
    'namespace' => 'ControlPanel',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'ControlPanelController@index');

});


Route::get('page-1', function(){
    return view('page-1');
});

Route::get('page-2', function(){
    return view('page-2');
});
