import angular from "angular";

angular
    .module('app')
    .component('programMembers', {
        template: require('./program-members.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            program: '<',
            message: '@'
        }
    });

function controller($http, notify) {

	let $ctrl = this;
	$ctrl.total = 0;
	$ctrl.page = 1;

	$ctrl.$onInit = function () {
        if ($ctrl.message) {
            notify({
                message: $ctrl.message,
                duration: 2000,
                position: 'top',
                classes: 'alert-success'
            });
        }
        getList();
    };

	function getList() {
	    $http
            .get(`/control-panel/programs/${$ctrl.program.id}/members/get-list`, {
                params: {
                    page: $ctrl.page
                }
            })
            .then(
                function (response) {
                    $ctrl.members = response.data.data;
                    $ctrl.total = response.data.total;
                },
                function (error) {

                }
            )
    }
}
