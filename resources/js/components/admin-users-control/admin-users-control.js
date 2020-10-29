import angular from "angular";

angular
    .module('app')
    .component('adminUsersControl', {
        template: require('./admin-users-control.html'),
        controller: ['$http', '$uibModal', controller],
        bindings: {
            roles: '<',
        }
    });
    
function controller($http, $uibModal) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.perPage = 10;

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
            .get('/control-panel/users/get-list', {
                params: {
                    page: $ctrl.page,
                    status: $ctrl.status,
                    per_page: $ctrl.perPage,
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
}