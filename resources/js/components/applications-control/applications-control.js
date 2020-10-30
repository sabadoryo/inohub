import angular from "angular";

angular
    .module('app')
    .component('applicationsControl', {
        template: require('./applications-control.html'),
        controller: ['$http', controller],
        bindings: {
            managers: '<',
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.page = 1;
	$ctrl.user = null;
	$ctrl.managerId = null;
    $ctrl.search = null;
    $ctrl.total = 0;

	$ctrl.$onInit = function () {
        $ctrl.getList();
    };

	$ctrl.filter = () => {
	    $ctrl.page = 1;
	    $ctrl.getList();
    }

    $ctrl.reset = () => {
	    $ctrl.managerId = null;
	    $ctrl.status = null;
        $ctrl.search = null;
	    $ctrl.page = 1;
	    $ctrl.getList();
    }


	$ctrl.getList = function () {
        $http
            .get('/control-panel/applications/get-list', {
                params: {
                    page: $ctrl.page,
                    manager_id: $ctrl.managerId,
                    status: $ctrl.status,
                    search: $ctrl.search,
                }
            })
            .then(
                res => {
                    $ctrl.applications = res.data.data;
                    $ctrl.total = res.data.total;
                },
                err => {

                }
            );
    };
}