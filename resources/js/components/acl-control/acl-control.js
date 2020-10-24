import angular from "angular";

angular
    .module('app')
    .component('aclControl', {
        template: require('./acl-control.html'),
        controller: ['$timeout', '$http', 'notify', '$uibModal', controller],
        bindings: {
            roles: '<',
            permissions: '<',
        }
    });
    
function controller($timeout, $http, notify, $uibModal) {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.selectedRole = $ctrl.roles[0];
	    refreshPermissionsStatuses();
    };

	function refreshPermissionsStatuses() {
        $timeout(function () {
            $ctrl.permissions.forEach(p => {
                let existsInd = $ctrl.selectedRole.permissions.findIndex(v => v.id === p.id);
                p.isSelected = existsInd !== -1;
            });
        })
    }

    $ctrl.selectRole = function (role) {
        $ctrl.selectedRole = role;
        refreshPermissionsStatuses();
    };

	$ctrl.openAddRoleModal = function () {
        $uibModal
            .open({
            component: 'addRoleModal'
            })
            .result
            .then(function (role) {
                $ctrl.roles.push(role);
                $ctrl.selectRole(role);
        })
    }

    $ctrl.permissionChanged = function (permission) {
	    if (permission.isSelected) {
            $http
                .post('/control-panel/acl/attach-permission-to-role', {
                    role_id: $ctrl.selectedRole.id,
                    permission_id: permission.id,
                })
                .then(
                    function () {
                        $ctrl.selectedRole.permissions.push(permission);
                        notify({
                            message: 'Сохранено',
                            duration: 2000,
                            position: 'right',
                            classes: 'alert-success'
                        });
                    },
                    function (error) {
                        // alert(error);
                    }
                )
        } else {
            $http
                .post('/control-panel/acl/detach-permission-from-role', {
                    role_id: $ctrl.selectedRole.id,
                    permission_id: permission.id,
                })
                .then(
                    function () {
                        let ind = $ctrl.selectedRole.permissions.findIndex(v => v.id == permission.id);
                        $ctrl.selectedRole.permissions.splice(ind, 1);
                        notify({
                            message: 'Сохранено',
                            duration: 2000,
                            position: 'right',
                            classes: 'alert-success'
                        });
                    },
                    function (error) {
                        // alert(error);
                    }
                )
        }
    };
}