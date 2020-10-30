import angular from "angular";

angular
    .module('app')
    .component('investors', {
        template: require('./investors.html'),
        controller: ['startupWindow', controller],
        bindings: {
            //
        }
    });

function controller(startupWindow) {

    let $ctrl = this;

    $ctrl.$onInit = function () {
        //
    };

    $ctrl.openInvestorForm = () => {
        startupWindow.open('investor', {});
    };
}