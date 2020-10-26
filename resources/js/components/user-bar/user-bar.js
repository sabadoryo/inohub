import angular from "angular";

angular
    .module('app')
    .component('userBar', {
        template: require('./user-bar.html'),
        controller: ['Auth', '$http', '$rootScope', controller],
        bindings: {
            //
        }
    });
    
function controller(Auth, $http, $rootScope) {
 
	let $ctrl = this;

	$rootScope.$on('UserAuthenticated', (event, data) => {
	    $ctrl.user = data.user;
    });

	$ctrl.$onInit = function () {
        $ctrl.user = Auth.user();
    };

	$ctrl.logout = () => {
	    $http
            .post('/logout')
            .then(
                res => {
                    $rootScope.$emit('UserLogout');
                    $ctrl.user = null;
                },
                err => {

                }
            );
    };

	$ctrl.openLoginModal = () => {
        Auth.openAuthModal();
    };
}