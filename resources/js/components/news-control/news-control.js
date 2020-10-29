import angular from "angular";

angular
    .module('app')
    .component('newsControl', {
        template: require('./news-control.html'),
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

    $ctrl.openCreateModal = () => {
        $uibModal
            .open({
                component: 'newsCreateModal',
            })
            .result
            .then(
                res => {

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
        $ctrl.title = null;
        $ctrl.status = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $ctrl.loading = true;
        $http
            .get('/control-panel/news/get-list', {
                params: {
                    page: $ctrl.page,
                    title: $ctrl.title,
                    status: $ctrl.status,
                }
            })
            .then(
                response => {
                    $ctrl.loading = false;
                    $ctrl.news = response.data.data;
                    $ctrl.total = response.data.total;
                },
                error => {
                    $ctrl.loading = false;
                    // todo handle error
                }
            )
    };
}