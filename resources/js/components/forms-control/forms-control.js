import angular from "angular";

angular
    .module('app')
    .component('formsControl', {
        template: require('./forms-control.html'),
        controller: [controller],
        bindings: {
            //
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {

    };
}