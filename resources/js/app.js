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
    ]);