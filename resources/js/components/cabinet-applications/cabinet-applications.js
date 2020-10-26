import angular from "angular";

angular
    .module('app')
    .component('cabinetApplications', {
        template: require('./cabinet-applications.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        $ctrl.getList();
    };

	$ctrl.getList = function () {
        $http
            .get('/cabinet/get-applications', {
                params: {

                }
            })
            .then(
                res => {
                    $ctrl.applications = res.data;
                },
                err => {

                }
            );
    };

}