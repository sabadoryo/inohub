import angular from "angular";

angular
    .module('app')
    .component('investors', {
        template: require('./investors.html'),
        controller: ['startupWindow', '$http', controller],
        bindings: {
            //
        }
    });

function controller(startupWindow, $http) {

    let $ctrl = this;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/investors/get-list')
            .then(
                res => {
                    $ctrl.investors = res.data;
                },
                err => {
                }
            );
    };

    $ctrl.openInvestorForm = () => {
        startupWindow.open('investor', {});
    };
}