import angular from "angular";

angular
    .module('app')
    .component('startups', {
        template: require('./startups.html'),
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
            .get('/startups/get-list')
            .then(
                res => {
                    $ctrl.startups = res.data;
                },
                err => {
                }
            );
    };

	$ctrl.openStartupForm = () => {
        startupWindow.open('startup', {});
    };
}