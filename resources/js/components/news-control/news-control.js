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
    $ctrl.status = 'draft';
    $ctrl.total = 0;

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
        $ctrl.name = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
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
                    $ctrl.news = response.data.data;
                    $ctrl.total = response.data.total;
                },
                error => {
                    // todo handle error
                }
            )
    };
}