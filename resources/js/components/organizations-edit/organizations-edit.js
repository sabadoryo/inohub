import angular from "angular";

angular
    .module('app')
    .component('organizationsEdit', {
        template: require('./organizations-edit.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http, notify) {

	let $ctrl = this;

	$ctrl.user = null;

	$ctrl.admins = [];

	$ctrl.$onInit = function () {
        $ctrl.organization = $ctrl.resolve.organization;

        $ctrl.organization.admins.forEach(function (admin) {
            $ctrl.admins.push(admin);
        });
    };

	$ctrl.getUsers = function (fragment) {
	    return $http
            .get(`/admin/organizations/get-users-by-fragment?fragment=${fragment}`)
            .then(
                function (response) {
                    $ctrl.users = response.data.users;
                    return $ctrl.users;
                },
                function (error) {

                }
            )
    };

	$ctrl.addAdmin = function () {
	    let user = $ctrl.admins.find(v => v.id === $ctrl.user.id);

	    if (!user) {
	        $ctrl.admins.push($ctrl.user);
	        $ctrl.user = null;
        }
    };

	$ctrl.deleteAdmin = function (index) {
        $ctrl.admins.splice(index, 1);
    }

	$ctrl.save = function () {
	    let adminIds = [];

	    $ctrl.admins.forEach(function (admin) {
	        adminIds.push(admin.id);
        });

	    $http
            .post(`/admin/organizations/${$ctrl.organization.id}/admins`, {
                adminIds: adminIds
            })
            .then(
                function (response) {
                    $ctrl.close({
                        $value: {
                            admins: response.data.admins
                        }
                    })
                },
                function (error) {
                    notify({
                        message: error.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    });
                }
            )
    };
}
