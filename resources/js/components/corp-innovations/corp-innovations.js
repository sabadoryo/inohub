import angular from "angular";

angular
    .module('app')
    .component('corpInnovations', {
        template: require('./corp-innovations.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.page = 1;

	$ctrl.$onInit = function () {
	    $ctrl.getTasks();
    };

	$ctrl.getTasks = () => {
	    $http
            .get('/control-panel/corp-innovations/tasks/get-list', {
                params: {
                    page: $ctrl.page,
                }
            })
            .then(
                res => {
                    $ctrl.tasks = res.data.data;
                    $ctrl.total = res.data.total;
                },
                err => {

                }
            );
    };
}