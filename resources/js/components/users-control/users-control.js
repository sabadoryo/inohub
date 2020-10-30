import angular from "angular";

angular
    .module('app')
    .component('usersControl', {
        template: require('./users-control.html'),
        controller: ['$http', 'notify', '$uibModal', controller],
        bindings: {}
    });

function controller($http, notify, $uibModal) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.perPage = 30;
    $ctrl.status = '';

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.perPageChanged = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.search = null;
        $ctrl.status = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/admin/users/get-list', {
                params: {
                    status: $ctrl.status,
                    page: $ctrl.page,
                    per_page: $ctrl.perPage,
                    search: $ctrl.search,
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

    $ctrl.openUserDetailsModal = function (user) {
        $uibModal
            .open({
                component: 'userDetailsModal',
                resolve: {
                    user: function () {
                        return user;
                    },
                }
            })
            .result
            .then((res) => {
                console.log(res);
                user.is_active = res;
                notify({
                    message: 'Успешно обновлено',
                    duration: 2000,
                    classes: 'alert-success'
                });
            })
    }
}
