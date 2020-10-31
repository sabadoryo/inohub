import angular from "angular";

angular
    .module('app')
    .component('techGardenLaboratories', {
        template: require('./tech-garden-laboratories.html'),
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