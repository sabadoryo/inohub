import angular from "angular";

angular
    .module('app')
    .component('registerModal', {
        template: require('./register-modal.html'),
        controller: ['$http', 'Upload', '$rootScope', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http, Upload, $rootScope) {

    let $ctrl = this;

    $ctrl.step = 1;
    $ctrl.lastName = null;
    $ctrl.firstName = null;
    $ctrl.email = null;
    $ctrl.password = null;
    $ctrl.passwordConfirmation = null;
    $ctrl.avatar = null;
    $ctrl.invalidAvatar = null;

    $ctrl.$onInit = function () {

    };

    $ctrl.changeType = (type) => {
        $ctrl.type = type;
    };

    $ctrl.toStep = function (step) {
        $ctrl.step = step;
    };

    $ctrl.register = function () {

        Upload
            .upload({
                url: '/register',
                data: {
                    first_name: $ctrl.firstName,
                    last_name: $ctrl.lastName,
                    email: $ctrl.email,
                    password: $ctrl.password,
                    password_confirmation: $ctrl.passwordConfirmation,
                    avatar: $ctrl.avatar ? $ctrl.avatar : null,
                },
            }).then(
            function (response) {
                $ctrl.step = 4;
                $rootScope.$emit('UserAuthenticated', response.data);
            },
            function (error) {

            }
        );
        // $http
        //     .post('/register', {
        //         first_name: $ctrl.firstName,
        //         last_name: $ctrl.lastName,
        //         email: $ctrl.email,
        //         password: $ctrl.password,
        //         password_confirmation: $ctrl.passwordConfirmation
        //     })
        //     .then(
        //         function (response) {
        //             $ctrl.step = 3;
        //         },
        //         function (error) {
        //
        //         }
        //     );
    };
}
