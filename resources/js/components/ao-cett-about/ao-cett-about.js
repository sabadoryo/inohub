import angular from "angular";

angular
    .module('app')
    .component('aoCettAbout', {
        template: require('./ao-cett-about.html'),
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