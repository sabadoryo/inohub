import angular from "angular";

angular
    .module('app')
    .component('formsControl', {
        template: require('./forms-control.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });

function controller($http) {

    let $ctrl = this;

    $ctrl.page = 1;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/control-panel/forms/get-list', {
                params: {
                    page: $ctrl.page,
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

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    }
}
