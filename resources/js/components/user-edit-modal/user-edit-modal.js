import angular from "angular";

angular
    .module('app')
    .component('userEditModal', {
        template: require('./user-edit-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.user = $ctrl.resolve.user;
	    $ctrl.isActive = $ctrl.user.is_active;
	    $ctrl.roles = $ctrl.resolve.roles;
	    $ctrl.roles.forEach((role) => {
	        role.isSelected = false;
        })
        $ctrl.setRoleStatus();
    };

	$ctrl.setRoleStatus = () => {
	    $ctrl.user.roles.forEach((role) => {
            let ind = $ctrl.roles.findIndex(v => v.id === role.id);
	        if (ind !== -1) {
	            $ctrl.roles[ind].isSelected = true;
            }
        });
    }

	$ctrl.submit = () => {
	    let rolesId = [];
	    $ctrl.roles.forEach((role) => {
	        if (role.isSelected) {
                rolesId.push(role.id);
            }
        });
	    let url = '/control-panel/admin-users/' + $ctrl.user.id + '/update-roles';
	    let params = {
	        roles_id: rolesId,
            is_active: $ctrl.isActive,
        };
	    $http.post(url, params).then((res) => {
            $ctrl.close({$value: {
                    roles: res.data.roles,
                    is_active: res.data.is_active,
                }
            });
        });
    }
}