import angular from "angular";

angular
    .module('app')
    .component('organizationsControl', {
        template: require('./organizations-control.html'),
        controller: ['$uibModal', controller],
        bindings: {
            organizations: '<'
        }
    });

function controller($uibModal) {

	let $ctrl = this;

	$ctrl.$onInit = function () {

    };

	$ctrl.editOrganization = function (organization) {
	    $uibModal
            .open({
                component: 'organizationsEdit',
                resolve: {
                    organization: function () {
                        return organization;
                    }
                }
            })
            .result
            .then(function (data) {
                organization.admin = data.admins;
            });
    };

}
