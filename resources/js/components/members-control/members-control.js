import angular from "angular";

angular
    .module('app')
    .component('membersControl', {
        template: require('./members-control.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.page = 1;
	$ctrl.companyName = null;
	$ctrl.projectName = null;
	$ctrl.status = null;

	$ctrl.$onInit = function () {
	    $ctrl.getList();
    };

	$ctrl.getList = () => {
	    $http
            .get('/control-panel/members/get-list', {
                params: {
                    page: $ctrl.page,
                    company_name: $ctrl.companyName,
                    project_name: $ctrl.projectName,
                    status: $ctrl.status,
                }
            })
            .then(
                res => {
                    $ctrl.members = res.data.data;
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
        $ctrl.companyName = null;
        $ctrl.projectName = null;
        $ctrl.status = null;
        $ctrl.getList();
    }

}