import angular from "angular";

angular
    .module('app')
    .component('programsControl', {
        template: require('./programs-control.html'),
        controller: ['$http', '$uibModal', controller],
        bindings: {
            categories: '<',
        }
    });
    
function controller($http, $uibModal) {
 
	let $ctrl = this;

	$ctrl.page = 1;
    $ctrl.title = null;
    $ctrl.status = null;
    $ctrl.category = null;

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
	    $ctrl.category = null;
	    $ctrl.getList();
    };

	$ctrl.getList = () => {
	    console.log($ctrl.status);
        $http
            .get('/control-panel/programs/get-list', {
                params: {
                    page: $ctrl.page,
                    category_id: $ctrl.category ? $ctrl.category.id : null,
                    title: $ctrl.title,
                    status: $ctrl.status,
                }
            })
            .then(
                response => {
                    $ctrl.programs = response.data.data;
                    $ctrl.total = response.data.total;
                },
                error => {
                    // todo handle error
                }
            )
    };

	$ctrl.openCreateModal = () => {
	    $uibModal
            .open({
                component: 'programCreateModal',
                resolve: {
                    categories: function () {
                        return $ctrl.categories;
                    }
                }
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