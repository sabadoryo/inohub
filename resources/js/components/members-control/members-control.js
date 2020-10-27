import angular from "angular";

angular
    .module('app')
    .component('membersControl', {
        template: require('./members-control.html'),
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