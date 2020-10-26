import angular from "angular";

angular
    .module('app')
    .component('usersControl', {
        template: require('./users-control.html'),
        controller: ['$http', 'notify', controller],
        bindings: {}
    });
    
function controller($http, notify) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.perPage = 30;
    $ctrl.status = 'active';

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.pageChanged = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    }

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.search = null;
        $ctrl.status = null;
        $ctrl.getList();
    };

    $ctrl.changeActive = (userId) => {
        let url = '/control-panel/users/' + userId + '/change-active';
        $http.post(url).then(function (response){
            notify({
                message: 'Активность пользователя изменено',
                duration: 2000,
                classes: 'alert-success',
            });
            $ctrl.getList();
        }, function (error){
            notify({
                message: 'Ошибка!',
                duration: 2000,
                classes: 'alert-danger',
            });
        });
    }

    $ctrl.getList = () => {
        $http
            .get('/control-panel/users/get-list', {
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
}