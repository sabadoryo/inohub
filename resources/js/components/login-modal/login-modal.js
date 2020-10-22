import angular from "angular";

angular
    .module('app')
    .component('loginModal', {
        template: require('./login-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.email = null;
	$ctrl.password = null;

	$ctrl.submit = function () {
	    $ctrl.loading = true;
	    $ctrl.errorMessage = null;

        $http
            .post('/login', {
                email: $ctrl.email,
                password: $ctrl.password
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    $ctrl.close({$value: res.data});
                },
                err => {
                    $ctrl.loading = false;
                    $ctrl.errorMessage = err.data.message;
                }
            );
    };
}