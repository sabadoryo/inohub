import angular from "angular";

angular
    .module('app')
    .component('applicationsControl', {
        template: require('./applications-control.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.page = 1;

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
                },
                err => {

                }
            );
    };
}