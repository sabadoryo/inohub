<?php

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('check-mail', 'Auth\RegisterController@checkMail');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', 'MainPageController@index');
Route::get('get-news-list', 'MainPageController@getNewsList');
Route::get('get-feeds-list', 'MainPageController@getFeedsList');
Route::get('news/{id}', 'MainPageController@newsPage');

Route::get('/events', function () {
    //todo i need controller
    return view('event-page');
});
Route::get('/investors', function () {
    //todo i need controller
    return view('investors-page');
});

Route::get('/startup-companies', function () {
    //todo i need controller
    return view('startup-page');
});

Route::get('/vacancies', function () {
    //todo i need controller
    return view('vacation-list');
});
Route::get('select-language/{lang}', 'SelectLanguageController@selectLanguage');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'cabinet', 'middleware' => ['auth']], function () {
        Route::get('', 'CabinetController@profile');
        Route::get('applications', 'CabinetController@applications');
        Route::get('applications/{id}', 'CabinetController@application');
        Route::get('notifications', 'CabinetController@notifications');
        Route::post('applications/{id}/update-form', 'CabinetController@updateForm');
        Route::post('applications/{id}/send-message', 'CabinetController@sendMessage');
        Route::get('get-applications', 'CabinetController@getApplications');
        Route::get('download-file/{path}/{name}', 'CabinetController@downloadFile')->where('path',  '(.*)');
    });
    Route::group(['prefix' => 'posts'], function () {
        Route::get('create', 'PostsController@create');
        Route::post('', 'PostsController@store');
    });

    Route::get('register-project', 'RegisterProjectController@form');
    Route::post('register-project', 'RegisterProjectController@store');
});

Route::group(['prefix' => 'astana-hub'], function () {
    Route::get('about', 'AstanaHubController@about');
    Route::get('programs', 'AstanaHubController@programs');
    Route::get('programs/{id}', 'AstanaHubController@program');
    Route::get('corporate-innovations', 'AstanaHubController@corporateInnovations');
    Route::get('corporate-innovations/get-list', 'AstanaHubController@getCorpTasksList');
    Route::get('hub-space', 'AstanaHubController@hubSpace');
    Route::get('r-and-d', 'AstanaHubController@randd');
    Route::get('resources', 'AstanaHubController@resources');
    Route::get('programs/{id}/get-forms', 'AstanaHubController@getProgramForms');
});

Route::get('test', function () {
    $program = \App\Program::find(9);
    $passport = \App\Passport::where('program_id', 9)->first();

    return view('test2', compact('passport'));
});

Route::group(['prefix' => 'tech-garden'], function () {
    Route::get('about', 'TechGardenController@about');
    Route::get('programs', 'TechGardenController@programs');
    Route::get('smart-store', 'TechGardenController@smartStore');
    Route::get('corporate-innovations', 'TechGardenController@corporateInnovations');
    Route::get('hub-space', 'TechGardenController@hubSpace');
    Route::get('r-and-d', 'TechGardenController@randd');
    Route::get('resources', 'TechGardenController@resources');
    Route::get('programs/{id}', 'TechGardenController@program');
    Route::get('programs/{id}/get-forms', 'TechGardenController@getProgramForms');
});

Route::group(['prefix' => 'ao-cett'], function () {
    Route::get('about', 'AoCettController@about');
    Route::get('grants', 'AoCettController@grants');
});

Route::group(['prefix' => 'tech-garden/smart-store'], function () {
    Route::get('get-tasks-list', 'TechGardenSmartStoreController@getTasksList');
    Route::get('get-solutions-list', 'TechGardenSmartStoreController@getSolutionsList');
});

Route::get('get-forms', 'FormsController@getList');

Route::post('applications', 'ApplicationsController@store');
Route::post('applications/{id}/send-message', 'ApplicationsController@sendMessage');

Route::group([
    'prefix' => 'control-panel',
    'namespace' => 'ControlPanel',
    'middleware' => ['auth', 'controlPanelAuth']
], function () {

    Route::get('/', 'ControlPanelController@controlPanel');

    Route::get('/get-applications-list', 'ControlPanelController@getApplicationsList');
    Route::get('/get-chart-members-list', 'ControlPanelController@getChartMembersList');
    Route::get('/get-users-list', 'ControlPanelController@getUsersList');

    Route::get('programs', 'ProgramsController@index');
    Route::get('programs/get-list', 'ProgramsController@getList');
    Route::post('programs', 'ProgramsController@store');
    Route::get('programs/{id}/main', 'ProgramsController@mainForm');
    Route::post('programs/{id}/update-main', 'ProgramsController@updateMain');
    Route::get('programs/{id}/page', 'ProgramsController@pageForm');
    Route::post('programs/{id}/update-page', 'ProgramsController@updatePage');
    Route::get('programs/{id}/forms', 'ProgramsController@forms');
    Route::post('programs/{id}/update-forms', 'ProgramsController@updateForms');
    Route::post('programs/{id}/publish', 'ProgramsController@publish');



    Route::get('users', 'UsersController@index');
    Route::get('users/get-list', 'UsersController@getList');
    Route::post('users/{id}/change-active', 'UsersController@changeActive');

    Route::get('admin-users', 'AdminUsersController@index');
    Route::get('admin-users/get-list', 'AdminUsersController@getList');
    Route::post('admin-users/{id}/update-roles', 'AdminUsersController@updateRoles');

    Route::get('roles', 'RolesController@index');

    Route::get('acl', 'ACLController@index');
    Route::post('acl/attach-permission-to-role', 'ACLController@attachPermissionToRole');
    Route::post('acl/detach-permission-from-role', 'ACLController@detachPermissionFromRole');
    Route::post('acl/add-role', 'ACLController@addRole');

    Route::get('images', 'ImagesController@index');
    Route::post('images', 'ImagesController@store');

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
    Route::post('news/{id}/update-main', 'NewsController@updateMain');
    Route::post('news/{id}/publish', 'NewsController@publish');

    Route::get('vacancies', 'VacanciesController@index');
    Route::get('vacancies/get-list', 'VacanciesController@getList');
    Route::post('vacancies', 'VacanciesController@store');
    Route::get('vacancies/{id}/main', 'VacanciesController@mainForm');
    Route::post('vacancies/{id}/update-main', 'VacanciesController@updateMain');
    Route::post('vacancies/{id}/publish', 'VacanciesController@publish');

    Route::get('projects', 'ProjectsController@index');
    Route::get('projects/get-list', 'ProjectsController@getList');
    Route::post('projects/{id}/update-status', 'ProjectsController@updateStatus');

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
    Route::get('forms/get-list', 'FormsController@getList');
    Route::get('forms/get-all', 'FormsController@getAll');
    Route::get('forms/create', 'FormsController@create');
    Route::post('forms', 'FormsController@store');


    Route::get('corp-innovations', 'CorpInnovationsController@index');
    Route::get('corp-innovations/tasks/get-list', 'CorpInnovationsController@getTasksList');
    Route::get('corp-innovations/tasks/{id}', 'CorpInnovationsController@task');

    Route::get('members','MembersController@index');
    Route::get('members/create', 'MembersController@create');
    Route::post('members', 'MembersController@store');
    Route::get('members/get-list', 'MembersController@getList');

    Route::post('passports/{id}/save-changes', 'PassportsController@saveChanges');

    Route::get('sm/solutions', 'SmartStoreSolutionCompaniesController@index');
    Route::get('sm/solutions/get-companies-list', 'SmartStoreSolutionCompaniesController@getList');
    Route::get('sm/solutions/create', 'SmartStoreSolutionCompaniesController@create');
    Route::post('sm/solutions', 'SmartStoreSolutionCompaniesController@store');
    Route::get('sm/solutions/{id}/edit', 'SmartStoreSolutionCompaniesController@edit');
    Route::post('sm/solutions/{id}/update', 'SmartStoreSolutionCompaniesController@update');
    Route::post('sm/solutions/{id}/remove', 'SmartStoreSolutionCompaniesController@remove');

    Route::get('sm/tasks', 'SmartStoreTaskCompaniesController@index');
    Route::get('sm/tasks/get-companies-list', 'SmartStoreTaskCompaniesController@getList');
    Route::get('sm/tasks/create', 'SmartStoreTaskCompaniesController@create');
    Route::post('sm/tasks', 'SmartStoreTaskCompaniesController@store');
    Route::get('sm/tasks/{id}/edit', 'SmartStoreTaskCompaniesController@edit');
    Route::post('sm/tasks/{id}/update', 'SmartStoreTaskCompaniesController@update');
    Route::post('sm/tasks/{id}/remove', 'SmartStoreTaskCompaniesController@remove');

    Route::get('corp-tasks', 'CorporateInnovationTasksController@index');
    Route::get('corp-tasks/get-list', 'CorporateInnovationTasksController@getList');
    Route::get('corp-tasks/create', 'CorporateInnovationTasksController@create');
    Route::post('corp-tasks', 'CorporateInnovationTasksController@store');
    Route::get('corp-tasks/{id}/edit', 'CorporateInnovationTasksController@edit');
    Route::post('corp-tasks/{id}/update', 'CorporateInnovationTasksController@update');
    Route::post('corp-tasks/{id}/remove', 'CorporateInnovationTasksController@remove');

    Route::get('corp-task-solutions', 'CorporateInnovationTaskSolutionsController@index');
    Route::get('corp-task-solutions/get-list', 'CorporateInnovationTaskSolutionsController@getList');
    Route::get('corp-task-solutions/create', 'CorporateInnovationTaskSolutionsController@create');
    Route::post('corp-task-solutions', 'CorporateInnovationTaskSolutionsController@store');
    Route::get('corp-task-solutions/{id}/edit', 'CorporateInnovationTaskSolutionsController@edit');
    Route::post('corp-task-solutions/{id}/update', 'CorporateInnovationTaskSolutionsController@update');
    Route::post('corp-task-solutions/{id}/remove', 'CorporateInnovationTaskSolutionsController@remove');

    Route::get('hub-space-tenants', 'HubSpaceTenantsController@index');
    Route::get('hub-space-tenants/get-list', 'HubSpaceTenantsController@getList');
    Route::get('hub-space-tenants/create', 'HubSpaceTenantsController@create');
    Route::post('hub-space-tenants', 'HubSpaceTenantsController@store');
    Route::get('hub-space-tenants/get-users-list', 'HubSpaceTenantsController@getUsersList');

});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function () {

    Route::get('modules', 'ModulesController@index');
    Route::post('modules/attach-module-to-org', 'ModulesController@attachModuleToOrg');
    Route::post('modules/detach-module-from-org', 'ModulesController@detachModuleFromOrg');

    Route::get('organizations', 'OrganizationsController@index');
    Route::get('organizations/create', 'OrganizationsController@create');
    Route::post('organizations', 'OrganizationsController@store');
    Route::get('organizations/{id}/edit', 'OrganizationsController@edit');
    Route::put('organizations/{id}', 'OrganizationsController@update');
    
    Route::get('posts', 'PostsController@index');
    Route::get('posts/get-list', 'PostsController@getList');
    Route::get('posts/{id}/check', 'PostsController@postCheck');
    Route::post('posts/{id}/update-status', 'PostsController@updateStatus');

});


Route::get('test-page', function () {
    return view('test-page');
});

Route::get('modal-page', function () {
    return view('modal-page');
});

Route::get('profile-page', function () {
    return view('profile-page');
});

Route::get('profile-page-2', function () {
    return view('profile-page-2');
});

Route::get('profile-page-3', function () {
    return view('profile-page-3');
});

Route::get('modal-full', function () {
    return view('modal-full');
});

Route::get('profile-page-4', function () {
    return view('profile-page-4');
});

Route::get('profile-page-5', function () {
    return view('profile-page-5');
});

Route::get('profile-page-6', function () {
    return view('profile-page-6');
});

Route::get('profile-page-7', function () {
    return view('profile-page-7');
});

Route::get('tech-garden-about', function () {
    return view('tech-garden-about');
});

Route::get('tech-garden-programs', function () {
    return view('tech-garden-programs');
});

Route::get('tech-garden-store', function () {
    return view('tech-garden-store');
});

Route::get('tech-garden-resources', function () {
    return view('tech-garden-resources');
});

Route::get('test-modal', function () {
    return view('test-modal');
});

Route::get('news-page', function () {
    return view('news-page');
});

Route::get('register-techpark', function () {
    return view('register-techpark');
});

Route::get('startup-page', function () {
    return view('startup-page');
});

Route::get('investors-page', function () {
    return view('investors-page');
});

Route::get('event-page', function () {
    return view('event-page');
});

Route::get('tech-garden-store-2', function () {
    return view('tech-garden-store-2');
});

Route::get('tech-garden-lab-1', function () {
    return view('tech-garden-lab-1');
});

Route::get('tech-garden-lab-2', function () {
    return view('tech-garden-lab-2');
});

Route::get('regional-page', function () {
    return view('regional-page');
});

Route::get('vacation-list', function () {
    return view('vacation-list');
});

Route::get('vacation-page', function () {
    return view('vacation-page');
});

Route::get('cett-grants', function () {
    return view('cett-grants');
});

Route::get('event-more', function () {
    return view('event-more');
});

Route::get('for-startup', function () {
    return view('for-startup');
});

Route::get('for-investor', function () {
    return view('for-investor');
});

Route::get('edit-post', function () {
    return view('edit-post');
});

