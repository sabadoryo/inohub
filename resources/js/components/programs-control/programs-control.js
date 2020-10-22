import angular from "angular";

angular
    .module('app')
    .component('programsControl', {
        template: require('./programs-control.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.page = 1;
	$ctrl.perPage = 6;
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
        $http
            .get('/control-panel/programs/get-list', {
                params: {
                    title: $ctrl.title,
                    status: $ctrl.status,
                    page: $ctrl.page,
                }
            })
            .then(
                response => {
                    $ctrl.total = response.data.total;
                    $ctrl.programs = response.data.data;
                },
                error => {
                    alert(error);
                    // todo handle error
                }
            )
    };
}