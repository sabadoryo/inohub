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
import textAngular from "textangular";
import perfectScrollbar from "angular-perfect-scrollbar";

require('angular-chart.js');

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
        notify,
        textAngular,
        'perfect_scrollbar',
        'chart.js'
    ])
    .config(['$provide', function ($provide) {
        $provide.decorator('taOptions', ['taRegisterTool', '$uibModal', '$delegate', function (taRegisterTool, $uibModal, taOptions) {
            taOptions.toolbar = [
                ['h3'],
                ['bold', 'italics', 'underline', 'ul', 'ol'],
                ['justifyLeft', 'justifyCenter', 'justifyRight'],
                ['insertLink'],
            ];
            taOptions.forceTextAngularSanitize = false;
            return taOptions;
        }]);

    }])
    .config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    }])
    .run(['$templateCache', function ($templateCache) {
        $templateCache.put('b4-pagination', require('./templates/b4-pagination.html'));
        $templateCache.put("custom-modal", "<div class=\"as-modal {{size ? 'as-modal--' + size : ''}}\" uib-modal-transclude></div>");
        $templateCache.put('full-modal', "<div class=\"modal-full\" uib-modal-transclude></div>")
    }])
    .directive('onScrollToBottom', function ($document) {
        //This function will fire an event when the container/document is scrolled to the bottom of the page
        return {
            restrict: 'A',
            link: function (scope, element, attrs) {

                var doc = angular.element($document)[0].body;

                $document.bind("scroll", function () {

                    //console.log('in scroll');
                    //console.log("scrollTop + offsetHeight:" + (doc.scrollTop + doc.offsetHeight));
                    //console.log("scrollHeight: " + doc.scrollHeight);

                    if (doc.scrollTop + doc.offsetHeight >= doc.scrollHeight) {
                        //run the event that was passed through
                        scope.$apply(attrs.onScrollToBottom);
                    }
                });
            }
        };
    })
    // .directive('scrollToLast', ['$location', '$anchorScroll', '$timeout', function ($location, $anchorScroll, $timeout) {
//
//     function linkFn(scope, element, attrs) {
//         $timeout(function () {
//             let kekw = 10;
//             angular.element(function () {
//                 kekw = true;
//                 console.log('lol');
//             });
//             if (kekw === 5) {
//                 $location.hash(attrs.scrollToLast);
//                 $anchorScroll();
//             }
//         });
//     }
//
//     return {
//         restrict: 'AE',
//         scope: {},
//         link: linkFn
//     };
//
// }]);


require('./auth');
require('./plural');
require('./controllers/mainController');
require('./applicationWindow');
require('./filters/translate');

require('./services/trans');

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
require('./components/cabinet-applications/cabinet-applications');
require('./components/applications-control/applications-control');
require('./components/application-manage/application-manage');
require('./components/application-reply-action/application-reply-action');
require('./components/forms-control/forms-control');
require('./components/form-create-form/form-create-form');
require('./components/cabinet-application-status/cabinet-application-status');

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
require('./components/event-create-modal/event-create-modal');
require('./components/event-main-form/event-main-form');
require('./components/event-page-form/event-page-form');
require('./components/event-forms/event-forms');
require('./components/event-to-publish-modal/event-to-publish-modal');
require('./components/program-to-publish-modal/program-to-publish-modal');
require('./components/page-builder/page-builder');
require('./components/news-control/news-control');
require('./components/news-create-modal/news-create-modal');
require('./components/news-main-form/news-main-form');
require('./components/news-upload-image/news-upload-image');
require('./components/corp-innovations/corp-innovations');
require('./components/members-control/members-control');
require('./components/members-create-form/members-create-form');
require('./components/news-to-publish-modal/news-to-publish-modal');
require('./components/tech-garden-about/tech-garden-about');
require('./components/tech-garden-programs/tech-garden-programs');
require('./components/tech-garden-corp-innovations/tech-garden-corp-innovations');
require('./components/news-list/news-list');

require('./components/smart-store-solution-companies/smart-store-solution-companies');
require('./components/smart-store-task-companies/smart-store-task-companies');

require('./components/smart-store-solution-companies-create/smart-store-solution-companies-create');

require('./components/smart-store-solution-companies-edit/smart-store-solution-companies-edit');
require('./components/smart-store-task-companies-create/smart-store-task-companies-create');
require('./components/smart-store-task-companies-edit/smart-store-task-companies-edit');


require('./components/feeds-list/feeds-list');
require('./components/application-form/application-form');
require('./components/tech-garden-smart-store/tech-garden-smart-store');
require('./components/vacancies-control/vacancies-control');
require('./components/vacancy-create-modal/vacancy-create-modal');
require('./components/vacancy-main-form/vacancy-main-form');
require('./components/cabinet-notifications/cabinet-notifications');
require('./components/post-create/post-create');
require('./components/posts-control/posts-control');
require('./components/projects-controller/projects-controller');

require('./components/corp-tasks/corp-tasks');
require('./components/corp-tasks-create/corp-tasks-create');
require('./components/corp-tasks-edit/corp-tasks-edit');
require('./components/corp-task-solutions/corp-task-solutions');
require('./components/corp-task-solutions-create/corp-task-solutions-create');
require('./components/corp-task-solutions-edit/corp-task-solutions-edit');

require('./components/hub-space-tenants/hub-space-tenants');
require('./components/hub-space-tenants-create/hub-space-tenants-create');
require('./components/modules-control/modules-control');
require('./components/user-edit-modal/user-edit-modal');

require('./components/ao-cett-about/ao-cett-about');
require('./components/ao-cett-grants/ao-cett-grants');
require('./components/post-check-form/post-check-form');