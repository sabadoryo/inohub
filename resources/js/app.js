require('./bootstrap');

import angular from "angular";
import angularAnimate from "angular-animate";
import angularTouch from "angular-touch";
import angularSanitize from "angular-sanitize";
import uiBootstrap from "angular1-ui-bootstrap4";
import angularFilter from "angular-filter";
import angularScroll from "angular-scroll";
import ngFileUpload from "ng-file-upload";
import angularMoment from "angular-moment";
import notify from "@cgross/angular-notify";


angular
    .module('app', [
        angularAnimate,
        angularTouch,
        angularSanitize,
        uiBootstrap,
        angularFilter,
        angularScroll,
        ngFileUpload,
        angularMoment,
        notify
    ])
    .config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    }])
    .run(['$templateCache', function ($templateCache) {
        $templateCache.put('b4-pagination', require('./templates/b4-pagination.html'));
    }]);


require('./auth');
require('./plural');
require('./controllers/mainController');
require('./controllers/cabinetController');

require('./components/organizations-control/organizations-control');
require('./components/organization-create-form/organization-create-form');
require('./components/organization-form/organization-form');
require('./components/control-panel/control-panel');
// require('./components/programs-form/programs-create-form');




require('./components/application-modal/application-modal');
require('./components/login-modal/login-modal');
require('./components/cabinet-profile/cabinet-profile');
require('./components/cabinet-project/cabinet-project');
require('./components/organization-edit-form/organization-edit-form');
require('./components/users-control/users-control');
require('./components/acl-control/acl-control');
require('./components/project-register-form/project-register-form');
require('./components/register-modal/register-modal');
require('./components/add-role-modal/add-role-modal');
require('./components/user-roles-modal/user-roles-modal');
require('./components/admin-users-control/admin-users-control');

require('./components/events-control/events-control');
require('./components/create-event-modal/create-event-modal');

require('./components/events-create/events-create');

require('./components/cabinet-applications/cabinet-applications');
require('./components/applications-control/applications-control');
require('./components/application-manage/application-manage');
require('./components/application-reply-action/application-reply-action');
require('./components/forms-control/forms-control');
require('./components/form-create-form/form-create-form');
require('./components/application-status/application-status');

require('./components/programs-control/programs-control');
require('./components/program-create-modal/program-create-modal');
require('./components/program-main-form/program-main-form');
require('./components/program-page-form/program-page-form');
require('./components/program-forms/program-forms');


require('./components/main-page/main-page');

require('./components/astana-hub-about/astana-hub-about');
require('./components/astana-hub-programs/astana-hub-programs');
require('./components/astana-hub-program/astana-hub-program');
require('./components/astana-hub-corp-innovations/astana-hub-corp-innovations');
require('./components/astana-hub-hub-space/astana-hub-hub-space');
require('./components/astana-hub-randd/astana-hub-randd');
require('./components/astana-hub-resources/astana-hub-resources');

require('./components/user-bar/user-bar');

require('./components/auth-modal/auth-modal');
require('./components/application-action-details-modal/application-action-details-modal');