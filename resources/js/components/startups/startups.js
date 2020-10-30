import angular from "angular";

angular
    .module('app')
    .component('startups', {
        template: require('./startups.html'),
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

	$ctrl.openStartupForm = () => {
        startupWindow.open({});
    };
}