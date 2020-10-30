import angular from "angular";

angular
    .module('app')
    .component('programsControl', {
        template: require('./programs-control.html'),
        controller: ['$http', '$uibModal', controller],
        bindings: {
        }
    });
    
function controller($http, $uibModal) {
 
	let $ctrl = this;

	$ctrl.page = 1;
    $ctrl.title = null;
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
        $ctrl.loading = true;
        $http
            .get('/control-panel/programs/get-list', {
                params: {
                    page: $ctrl.page,
                    title: $ctrl.title,
                    status: $ctrl.status,
                }
            })
            .then(
                response => {
                    $ctrl.loading = false;
                    $ctrl.programs = response.data.data;
                    $ctrl.total = response.data.total;
                },
                error => {
                    $ctrl.loading = false;
                }
            )
    };

	$ctrl.openCreateModal = () => {
	    $uibModal.open({
            component: 'programCreateModal',
        });
    };
}