import angular from "angular";

angular
    .module('app')
    .component('teechGardenLaboratories', {
        template: require('./teech-garden-laboratories.html'),
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