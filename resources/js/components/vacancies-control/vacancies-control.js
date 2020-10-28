import angular from "angular";

angular
    .module('app')
    .component('vacanciesControl', {
        template: require('./vacancies-control.html'),
        controller: ['$http', '$uibModal', controller],
        bindings: {
            //
        }
    });

function controller($http, $uibModal) {

	let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.title = null;
    $ctrl.status = null;
    $ctrl.total = 0;
    $ctrl.loading = false;

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

    $ctrl.getList = function() {
        $ctrl.loading = true;
        $http
            .get('/control-panel/vacancies/get-list', {
                params: {
                    page: $ctrl.page,
                    title: $ctrl.title,
                    status: $ctrl.status,
                }
            })
            .then(
                response => {
                    $ctrl.loading = false;
                    $ctrl.vacancies = response.data.data;
                    $ctrl.total = response.data.total;
                },
                error => {
                    $ctrl.loading = false;
                    // todo handle error
                }
            )
    };

    $ctrl.openCreateModal = () => {
        $uibModal
            .open({
                component: 'vacancyCreateModal',
            })
            .result
            .then(
                res => {

                },
                err => {

                }
            );
    };
}