import angular from "angular";

angular
    .module('app')
    .component('startupsControl', {
        template: require('./startups-control.html'),
        controller: ['$http', 'notify', '$uibModal', controller],
        bindings: {
            inputId: '<',
        }
    });

function controller($http, notify, $uibModal) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.perPage = 30;
    $ctrl.id = null;
    $ctrl.status = '';
    $ctrl.project = '';
    $ctrl.companyNameOrBIN = '';

    $ctrl.$onInit = function () {
        if ($ctrl.inputId) {
            $ctrl.id = $ctrl.inputId;
        }
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
        $ctrl.id = null;
        $ctrl.project = '';
        $ctrl.companyNameOrBIN = '';
        $ctrl.status = '';
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $http
            .get('/admin/startups/get-list', {
                params: {
                    page: $ctrl.page,
                    per_page: $ctrl.perPage,
                    id: $ctrl.id,
                    status: $ctrl.status,
                    project: $ctrl.project,
                    companyNameOrBIN: $ctrl.companyNameOrBIN,
                }
            })
            .then(
                response => {
                    $ctrl.total = response.data.total;
                    $ctrl.startups = response.data.data;
                },
                error => {
                    alert(error);
                }
            )
    };

    $ctrl.openStartupDetailsModal = function (startup) {
        $uibModal
            .open({
                component: 'startupDetailsModal',
                resolve: {
                    startup: function () {
                        return startup;
                    },
                }
            })
            .result
            .then((res) => {
                startup.status = res;
                notify({
                    message: 'Успешно обновлено',
                    duration: 2000,
                    classes: 'alert-success'
                });
            })
    }
}
