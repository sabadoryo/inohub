import angular from "angular";

angular
    .module('app')
    .component('techGardenResources', {
        template: require('./tech-garden-resources.html'),
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