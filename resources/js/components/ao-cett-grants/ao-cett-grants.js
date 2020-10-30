import angular from "angular";

angular
    .module('app')
    .component('aoCettGrants', {
        template: require('./ao-cett-grants.html'),
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