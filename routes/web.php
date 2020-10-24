<?php

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
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

Route::get('register-project', 'RegisterProjectController@form');
Route::post('register-project', 'RegisterProjectController@store');

Route::group([
    'prefix' => 'control-panel',
    'namespace' => 'ControlPanel',
    'middleware' => 'auth'
], function () {

    Route::get('/', 'ControlPanelController@index');

    Route::get('organizations', 'OrganizationsController@index');
    Route::get('organizations/create', 'OrganizationsController@create');
    Route::post('organizations', 'OrganizationsController@store');
    Route::get('organizations/{id}/edit', 'OrganizationsController@edit');
    Route::put('organizations/{id}', 'OrganizationsController@update');

    Route::get('users', 'UsersController@index');
    Route::get('users/get-list', 'UsersController@getList');

    Route::get('roles', 'RolesController@index');

    Route::get('acl', 'ACLController@index');
    Route::post('acl/attach-permission-to-role', 'ACLController@attachPermissionToRole');
    Route::post('acl/detach-permission-from-role', 'ACLController@detachPermissionFromRole');

    Route::get('programs', 'ProgramsController@index');
    Route::get('programs/get-list', 'ProgramsController@getList');
    Route::get('programs/create', 'ProgramsController@create');
    Route::post('programs', 'ProgramsController@store');

});

