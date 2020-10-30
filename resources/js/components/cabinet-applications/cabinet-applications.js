import angular from "angular";

angular
    .module('app')
    .component('cabinetApplications', {
        template: require('./cabinet-applications.html'),
        controller: ['$http', '$uibModal', controller],
        bindings: {
            //
        }
    });

function controller($http, $uibModal) {

    let $ctrl = this;
    $ctrl.page = 1;
    $ctrl.status = null;
    $ctrl.total = 0;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.getList = function () {
        $http
            .get('/cabinet/get-applications', {
                params: {
                    page: $ctrl.page,
                    status: $ctrl.status,
                }
            })
            .then(
                res => {
                    $ctrl.applications = res.data.data;
                    $ctrl.total = res.data.total;
                    console.log(res);
                },
                err => {

                }
            );
    };

}
