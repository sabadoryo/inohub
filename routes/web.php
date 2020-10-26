<?php

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'MainPageController@index');

Route::group(['prefix' => 'astana-hub'], function () {
    Route::get('', 'AstanaHubController@index');
    Route::get('programs/{id}', 'AstanaHubController@program');
    Route::get('programs/{id}/get-forms', 'AstanaHubController@getProgramForms');
});

Route::post('applications', 'ApplicationsController@store');
Route::post('applications/{id}/send-message', 'ApplicationsController@sendMessage');

Route::group(['prefix' => 'cabinet', 'middleware' => ['auth']], function () {
    Route::get('', 'CabinetController@profile');
    Route::get('project', 'CabinetController@project');
    Route::post('update-roles', 'CabinetController@updateRoles');
    Route::get('applications', 'CabinetController@applications');
    Route::get('applications/{id}', 'CabinetController@application');
    Route::post('applications/{id}/update-form', 'CabinetController@updateForm');
    Route::post('applications/{id}/send-message', 'CabinetController@sendMessage');
    Route::get('get-applications', 'CabinetController@getApplications');
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
    Route::post('users/{id}/change-active', 'UsersController@changeActive');

    Route::get('admin-users', 'AdminUsersController@index');
    Route::get('admin-users/get-list', 'AdminUsersController@getList');
    Route::post('admin-users/{id}/change-active', 'AdminUsersController@changeActive');

    Route::get('roles', 'RolesController@index');

    Route::get('acl', 'ACLController@index');
    Route::post('acl/attach-permission-to-role', 'ACLController@attachPermissionToRole');
    Route::post('acl/detach-permission-from-role', 'ACLController@detachPermissionFromRole');
    Route::post('acl/add-role', 'ACLController@addRole');

    Route::get('programs', 'ProgramsController@index');
    Route::get('programs/get-list', 'ProgramsController@getList');
    Route::post('programs', 'ProgramsController@store');
    Route::get('programs/{id}/main', 'ProgramsController@mainForm');
    Route::get('programs/{id}/page', 'ProgramsController@pageForm');
    Route::get('programs/{id}/forms', 'ProgramsController@forms');
    Route::post('programs/{id}/update-main', 'ProgramsController@updateMain');
    Route::post('programs/{id}/update-forms', 'ProgramsController@updateForms');
    Route::post('programs/{id}/update-forms-list', 'ProgramsController@updateFormsList');

    Route::get('events', 'EventsController@index');
    Route::get('events/get-list', 'EventsController@getList');
    Route::get('events/create', 'EventsController@create');
    Route::post('events', 'EventsController@store');

    Route::get('applications', 'ApplicationsController@index');
    Route::get('applications/get-list', 'ApplicationsController@getList');
    Route::get('applications/{id}', 'ApplicationsController@show');
    Route::post('applications/{id}/take-for-processing', 'ApplicationsController@takeForProcessing');
    Route::post('applications/{id}/reply', 'ApplicationsController@reply');

    Route::get('events', 'EventsController@index');
    Route::get('events/get-list', 'EventsController@getList');
    Route::get('events/create', 'EventsController@create');
    Route::post('events', 'EventsController@store');

    Route::get('forms', 'FormsController@index');
    Route::get('forms/create', 'FormsController@create');
    Route::post('forms', 'FormsController@store');
});

