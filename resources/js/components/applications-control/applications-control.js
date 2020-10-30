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
	$ctrl.manager = null;

	$ctrl.$onInit = function () {
        $ctrl.getList();
    };

	$ctrl.getList = function () {
        $http
            .get('/control-panel/applications/get-list', {
                params: {
                    page: $ctrl.page,
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