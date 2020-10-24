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
import 'grapesjs/dist/css/grapes.min.css';

angular
    .module('app', [
        angularAnimate,
        angularTouch,
        angularSanitize,
        uiBootstrap,
        angularFilter,
        angularScroll,
        ngFileUpload,
        angularMoment
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
require('./components/programs-control/programs-control');
require('./components/programs-create-form/programs-create-form');
require('./components/astana-hub-page/astana-hub-page');
require('./components/astana-hub-program/astana-hub-program');
require('./components/application-modal/application-modal');
require('./components/login-modal/login-modal');
require('./components/cabinet-profile/cabinet-profile');
require('./components/cabinet-project/cabinet-project');
