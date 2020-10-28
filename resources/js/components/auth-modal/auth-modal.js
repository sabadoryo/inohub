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
	$ctrl.showPassword = false;
	$ctrl.nextStep = true;

	$ctrl.login = {
	    email: null,
        password: null
    };

	$ctrl.register = {
	    step: 1,
        firstName: null,
        lastName: null,
        email: null,
        avatar: null,
        password: null,
        passwordConfirmation: null,
    };

	$ctrl.registerAddData = () => {
	    if ($ctrl.register.step === 1) {
            $ctrl.errorMessage = null;
	        if ($ctrl.register.lastName && $ctrl.register.firstName) {
	            if ($ctrl.register.email) {
                    $http.post('/check-mail', {
                        email: $ctrl.register.email,
                    }).then((res) => {
                        $ctrl.nextStep = false;
                    }, (error) => {
                        $ctrl.errorMessage = error.data.message;
                        $ctrl.nextStep = true;
                    });
                } else {
	                $ctrl.nextStep = true;
                }
            } else {
	            $ctrl.nextStep = true;
            }
        } else if($ctrl.register.step === 3) {
            $ctrl.errorMessage = null;
	        if ($ctrl.register.password && $ctrl.register.password.length > 5) {
	            if ($ctrl.register.passwordConfirmation && $ctrl.register.password === $ctrl.register.passwordConfirmation) {
	                $ctrl.nextStep = false;
                } else if($ctrl.register.passwordConfirmation) {
                    $ctrl.nextStep = true;
                    $ctrl.errorMessage = 'Пароль должен одинаковым';
                }
            } else {
                $ctrl.nextStep = true;
                $ctrl.errorMessage = 'Пароль должен быть больше 5 символов';
            }
        }
    }

	$ctrl.changeStatusPassword = () => {
	    $ctrl.showPassword = !$ctrl.showPassword;
    };

	$ctrl.changeType = (type) => {
	    if (type === 'login') {
            $ctrl.login = {
                email: null,
                password: null
            };
        } else {
            $ctrl.register = {
                step: 1,
                firstName: null,
                lastName: null,
                email: null,
                avatar: null,
                password: null,
                passwordConfirmation: null,
            };
            $ctrl.nextStep = true;
        }
        $ctrl.errorMessage = null;
        $ctrl.type = type;
    };

    $ctrl.toStep = (step) => {
        $ctrl.nextStep = true;
        $ctrl.errorMessage = null;
        $ctrl.register.step = step;
    };

	$ctrl.doLogin = () => {
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