import angular from "angular";

angular
    .module('app')
    .component('projectsController', {
        template: require('./projects-controller.html'),
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