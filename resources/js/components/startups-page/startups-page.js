import angular from "angular";

angular
    .module('app')
    .component('startupsPage', {
        template: require('./startups-page.html'),
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