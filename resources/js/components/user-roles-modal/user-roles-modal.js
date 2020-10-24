import angular from "angular";

angular
    .module('app')
    .component('userRolesModal', {
        template: require('./user-roles-modal.html'),
        controller: [controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
	    $ctrl.user = $ctrl.resolve.user;
    };
}