import angular from "angular";

angular
    .module('app')
    .component('applicationModal', {
        template: require('./application-modal.html'),
        controller: ['Auth', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller(Auth) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
	    $ctrl.user = Auth.user();
    };

	$ctrl.openLoginModal = () => {
	    Auth.openLoginModal().then(
            user => {
                $ctrl.user = user;
            }
        );
    };

}