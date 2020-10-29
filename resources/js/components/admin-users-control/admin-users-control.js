import angular from "angular";

angular
    .module('app')
    .component('adminUsersControl', {
        template: require('./admin-users-control.html'),
        controller: ['$http', '$uibModal', 'notify', controller],
        bindings: {
            roles: '<',
        }
    });
    
function controller($http, $uibModal, notify) {

    let $ctrl = this;

    $ctrl.page = 1;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.search = null;
        $ctrl.status = null;
        $ctrl.roleId = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/control-panel/admin-users/get-list', {
                params: {
                    page: $ctrl.page,
                    status: $ctrl.status,
                    search: $ctrl.search,
                    role_id: $ctrl.roleId,
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

    $ctrl.openUserEditModal = (index) => {
    $uibModal
        .open({
            component: 'userEditModal',
            resolve: {
                user: function () {
                    return $ctrl.users[index];
                },
                roles: function () {
                    return $ctrl.roles;
                }
            }
        }).result
        .then((res) => {
            $ctrl.users[index].roles = res.roles;
            $ctrl.users[index].is_active = res.is_active;
            notify({
                message: 'Успешно обновлено',
                duration: 2000,
                classes: 'alert-success'
            });
        })
    };
}