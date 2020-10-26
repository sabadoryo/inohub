import angular from "angular";

angular
    .module('app')
    .component('adminUsersControl', {
        template: require('./admin-users-control.html'),
        controller: [controller],
        bindings: {
            organizations: '<',
            roles: '<',
            roleId: '<',
        }
    });
    
function controller($http, $uibModal) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.perPage = 30;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.openUserRolesModal = (index) => {
        $uibModal
            .open({
                component: 'userRolesModal',
                resolve: {
                    user: function () {
                        return $ctrl.users[index];
                    }
                }
            })
    }

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.search = null;
        $ctrl.status = null;
        $ctrl.roleId = null;
        $ctrl.organizationId = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/control-panel/users/get-list', {
                params: {
                    status: $ctrl.status,
                    page: $ctrl.page,
                    per_page: $ctrl.perPage,
                    search: $ctrl.search,
                    role_id: $ctrl.roleId,
                    organization_id: $ctrl.organizationId,
                }
            })
            .then(
                response => {
                    $ctrl.total = response.data.total;
                    $ctrl.users = response.data.data;
                },
                error => {
                    alert(error);
                    // todo handle error
                }
            )
    };
}