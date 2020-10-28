<?php

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'MainPageController@index');

Route::group(['prefix' => 'cabinet', 'middleware' => ['auth']], function () {
    Route::get('', 'CabinetController@profile');
    Route::get('applications', 'CabinetController@applications');

    Route::get('project', 'CabinetController@project');
    Route::post('update-roles', 'CabinetController@updateRoles');
    Route::get('applications/{id}', 'CabinetController@application');
    Route::post('applications/{id}/update-form', 'CabinetController@updateForm');
    Route::post('applications/{id}/send-message', 'CabinetController@sendMessage');
    Route::get('get-applications', 'CabinetController@getApplications');
});

Route::get('register-project', 'RegisterProjectController@form');
Route::post('register-project', 'RegisterProjectController@store');

Route::group(['prefix' => 'astana-hub'], function () {
    Route::get('about', 'AstanaHubController@about');
    Route::get('programs', 'AstanaHubController@programs');
    Route::get('corporate-innovations', 'AstanaHubController@corporateInnovations');
    Route::get('hub-space', 'AstanaHubController@hubSpace');
    Route::get('r-and-d', 'AstanaHubController@randd');
    Route::get('resources', 'AstanaHubController@resources');
    Route::get('programs/{id}', 'AstanaHubController@program');
    Route::get('programs/{id}/get-forms', 'AstanaHubController@getProgramForms');
});

Route::get('get-forms', 'FormsController@getList');

Route::post('applications', 'ApplicationsController@store');
Route::post('applications/{id}/send-message', 'ApplicationsController@sendMessage');

Route::group([
    'prefix' => 'control-panel',
    'namespace' => 'ControlPanel',
    'middleware' => 'auth'
], function () {

    Route::view('test', 'test', ['activePage' => 'test', 'breadcrumb' => []]);

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
    Route::post('programs/{id}/publish', 'ProgramsController@publish');

    Route::get('events', 'EventsController@index');
    Route::get('events/get-list', 'EventsController@getList');
    Route::post('events', 'EventsController@store');
    Route::get('events/{id}/main', 'EventsController@mainForm');
    Route::get('events/{id}/page', 'EventsController@pageForm');
    Route::get('events/{id}/forms', 'EventsController@forms');
    Route::post('events/{id}/update-main', 'EventsController@updateMain');
    Route::post('events/{id}/update-forms', 'EventsController@updateForms');
    Route::post('events/{id}/update-forms-list', 'EventsController@updateFormsList');
    Route::post('events/{id}/publish', 'EventsController@publish');
    
    Route::get('news', 'NewsController@index');
    Route::get('news/get-list', 'NewsController@getList');
    Route::post('news', 'NewsController@store');
    Route::get('news/{id}/main', 'NewsController@mainForm');

    Route::get('applications', 'ApplicationsController@index');
    Route::get('applications/get-list', 'ApplicationsController@getList');
    Route::get('applications/{id}', 'ApplicationsController@show');
    Route::post('applications/{id}/take-for-processing', 'ApplicationsController@takeForProcessing');
    Route::post('applications/{id}/accept', 'ApplicationsController@accept');

    Route::get('events', 'EventsController@index');
    Route::get('events/get-list', 'EventsController@getList');
    Route::get('events/create', 'EventsController@create');
    Route::post('events', 'EventsController@store');

    Route::get('forms', 'FormsController@index');
    Route::get('forms/create', 'FormsController@create');
    Route::post('forms', 'FormsController@store');


    Route::get('corp-innovations', 'CorpInnovationsController@index');
    Route::get('corp-innovations/tasks/get-list', 'CorpInnovationsController@getTasksList');
    Route::get('corp-innovations/tasks/{id}', 'CorpInnovationsController@task');

    Route::get('members','MembersController@index');
    Route::get('members/create', 'MembersController@create');
    Route::post('members', 'MembersController@store');
    Route::get('members/get-list', 'MembersController@getList');

});

