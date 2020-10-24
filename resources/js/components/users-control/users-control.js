import angular from "angular";

angular
    .module('app')
    .component('usersControl', {
        template: require('./users-control.html'),
        controller: ['$http', controller],
        bindings: {
            organizations: '<',
        }
    });
    
function controller($http) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.perPage = 20;
    $ctrl.search = null;
    $ctrl.organization = null;
    $ctrl.status = null;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.title = null;
        $ctrl.status = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/control-panel/users/get-list', {
                params: {
                    title: $ctrl.title,
                    status: $ctrl.status,
                    page: $ctrl.page,
                    per_page: $ctrl.perPage,
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