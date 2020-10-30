import angular from "angular";

angular
    .module('app')
    .component('eventPage', {
        template: require('./event-page.html'),
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