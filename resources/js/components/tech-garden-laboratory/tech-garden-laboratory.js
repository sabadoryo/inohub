import angular from "angular";

angular
    .module('app')
    .component('techGardenLaboratory', {
        template: require('./tech-garden-laboratory.html'),
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