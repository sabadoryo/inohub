<?php

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'MainPageController@index');

Route::group(['prefix' => 'astana-hub'], function () {
    Route::get('', 'AstanaHubController@index');
    Route::get('programs/{id}', 'AstanaHubController@program');
});

Route::group(['prefix' => 'cabinet', 'middleware' => ['auth']], function () {
    Route::get('', 'CabinetController@profile');
    Route::get('project', 'CabinetController@project');
    Route::post('update-roles', 'CabinetController@updateRoles');
});

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

    Route::get('programs', 'ProgramsController@index');
    Route::get('programs/get-list', 'ProgramsController@getList');
    Route::get('programs/create', 'ProgramsController@create');
    Route::post('programs', 'ProgramsController@store');
});

