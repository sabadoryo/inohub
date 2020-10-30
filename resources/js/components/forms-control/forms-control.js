import angular from "angular";

angular
    .module('app')
    .component('formsControl', {
        template: require('./forms-control.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            message: '@'
        }
    });

function controller($http, notify) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.title = null;

    $ctrl.$onInit = function () {
        if ($ctrl.message) {
            notify({
                message: $ctrl.message,
                duration: 2000,
                position: 'top-right',
                classes: 'alert-success'
            });
        }
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/control-panel/forms/get-list', {
                params: {
                    page: $ctrl.page,
                    title: $ctrl.title
                }
            })
            .then(
                res => {
                    $ctrl.forms = res.data.data;
                    $ctrl.total = res.data.total;
                },
                err => {

                }
            );
    };

    $ctrl.search = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.title = null;
        $ctrl.getList();
    }

}
