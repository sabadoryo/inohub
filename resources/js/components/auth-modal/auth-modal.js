import angular from "angular";

angular
    .module('app')
    .component('authModal', {
        template: require('./auth-modal.html'),
        controller: ['$http', '$rootScope', 'Upload', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http, $rootScope, Upload) {
 
	let $ctrl = this;

	$ctrl.type = 'login';

	$ctrl.login = {
	    email: null,
        password: null
    };

	$ctrl.register = {
	    step: 1,
        firstName: null,
        lastName: null,
        avatar: null,
        password: null,
        passwordConfirmation: null,
    };

	$ctrl.changeType = (type) => {
        $ctrl.type = type;
    };

    $ctrl.toStep = function (step) {
        $ctrl.register.step = step;
    };

	$ctrl.doLogin = function () {
	    $ctrl.loading = true;
	    $ctrl.errorMessage = null;
        $http
            .post('/login', {
                email: $ctrl.login.email,
                password: $ctrl.login.password
            })
            .then(
                res => {
                    $rootScope.$emit('UserAuthenticated', res.data);
                    $ctrl.loading = false;
                    $ctrl.close();
                },
                err => {
                    $ctrl.loading = false;
                    $ctrl.errorMessage = err.data.message;
                }
            );
    };

    $ctrl.doRegister = function () {
        Upload
            .upload({
                url: '/register',
                data: {
                    first_name: $ctrl.register.firstName,
                    last_name: $ctrl.register.lastName,
                    email: $ctrl.register.email,
                    password: $ctrl.register.password,
                    password_confirmation: $ctrl.register.passwordConfirmation,
                    avatar: $ctrl.register.avatar ? $ctrl.register.avatar : null,
                },
            }).then(
                function (response) {
                    $ctrl.register.step = 4;
                    $rootScope.$emit('UserAuthenticated', response.data);
                    // $ctrl.close();
                },
                function (error) {

                }
            );
    };
}