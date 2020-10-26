import angular from "angular";

angular
    .module('app')
    .component('registerModal', {
        template: require('./register-modal.html'),
        controller: ['$http', '$rootScope', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http, $rootScope) {
 
	let $ctrl = this;

    $ctrl.step = 1;
    $ctrl.lastName = null;
    $ctrl.firstName = null;
    $ctrl.email = null;
    $ctrl.password = null;
    $ctrl.passwordConfirmation = null;

	$ctrl.$onInit = function () {

	};

	$ctrl.toStep = function (step) {
        $ctrl.step = step;
    };

	$ctrl.register = function () {
	    $http
            .post('/register', {
                first_name: $ctrl.firstName,
                last_name: $ctrl.lastName,
                email: $ctrl.email,
                password: $ctrl.password,
                password_confirmation: $ctrl.passwordConfirmation
            })
            .then(
                function (response) {
                    $ctrl.step = 3;
                },
                function (error) {

                }
            );
    };
}