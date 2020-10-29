import angular from "angular";

angular
    .module('app')
    .component('cabinetNotifications', {
        template: require('./cabinet-notifications.html'),
        controller: [controller],
        bindings: {
            //
        }
    });

function controller() {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        //
    };
}