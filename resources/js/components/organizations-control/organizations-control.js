import angular from "angular";

angular
    .module('app')
    .component('organizationsControl', {
        template: require('./organizations-control.html'),
        controller: [controller],
        bindings: {
            organizations: '<'
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
	    console.log($ctrl.organizations);
    };

}