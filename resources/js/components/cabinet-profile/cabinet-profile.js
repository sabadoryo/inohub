import angular from "angular";

angular
    .module('app')
    .component('cabinetProfile', {
        template: require('./cabinet-profile.html'),
        controller: ['$http', 'Auth', controller],
        bindings: {
            //
        }
    });
    
function controller($http, Auth) {
 
	let $ctrl = this;

	$ctrl.startup = false;
	$ctrl.investor = false;

	$ctrl.$onInit = function () {
	    console.log('tset');

	    $ctrl.startup = Auth.hasRole('startup');
	    $ctrl.investor = Auth.hasRole('investor');
    };

	$ctrl.updateRoles = function () {
	    $ctrl.rolesLoading = true;
	    $http
            .post('/cabinet/update-roles', {
                startup: $ctrl.startup,
                investor: $ctrl.investor
            })
            .then(
                () => {
                    $ctrl.rolesLoading = false;
                },
                () => {
                    $ctrl.rolesLoading = false;
                }
            );
    };
}