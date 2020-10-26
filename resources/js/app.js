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
        $templateCache.put("uib/template/pagination/pagination.html",
            "<li ng-if=\"::boundaryLinks\" ng-class=\"{disabled: noPrevious()||ngDisabled}\" class=\"page-item pagination-first\"><a href class=\"page-link\" ng-click=\"selectPage(1, $event)\" ng-disabled=\"noPrevious()||ngDisabled\" uib-tabindex-toggle><i class=\"fas fa-arrow-circle-left\"></i></a></li>\n" +
            "<li ng-if=\"::directionLinks\" ng-class=\"{disabled: noPrevious()||ngDisabled}\" class=\"page-item pagination-prev\"><a href class=\"page-link\" ng-click=\"selectPage(page - 1, $event)\" ng-disabled=\"noPrevious()||ngDisabled\" uib-tabindex-toggle><i class=\"fas fa-arrow-left\"></i></a></li>\n" +
            "<li ng-repeat=\"page in pages track by $index\" ng-class=\"{active: page.active,disabled: ngDisabled&&!page.active}\" class=\"page-item pagination-page\"><a href class=\"page-link\" ng-click=\"selectPage(page.number, $event)\" ng-disabled=\"ngDisabled&&!page.active\" uib-tabindex-toggle>{{page.text}}</a></li>\n" +
            "<li ng-if=\"::directionLinks\" ng-class=\"{disabled: noNext()||ngDisabled}\" class=\"page-item pagination-next\"><a href class=\"page-link\" ng-click=\"selectPage(page + 1, $event)\" ng-disabled=\"noNext()||ngDisabled\" uib-tabindex-toggle><i class=\"fas fa-arrow-right\"></i></a></li>\n" +
            "<li ng-if=\"::boundaryLinks\" ng-class=\"{disabled: noNext()||ngDisabled}\" class=\"page-item pagination-last\"><a href class=\"page-link\" ng-click=\"selectPage(totalPages, $event)\" ng-disabled=\"noNext()||ngDisabled\" uib-tabindex-toggle><i class=\"fas fa-arrow-circle-right\"></i></a></li>\n" +
            "");
    }]);


require('./auth');
require('./plural');
require('./controllers/mainController');
require('./controllers/cabinetController');

require('./components/organizations-control/organizations-control');
require('./components/organization-create-form/organization-create-form');
require('./components/organization-form/organization-form');
require('./components/control-panel/control-panel');
require('./components/programs-control/programs-control');
require('./components/programs-create-form/programs-create-form');
require('./components/astana-hub-page/astana-hub-page');
require('./components/astana-hub-program/astana-hub-program');
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