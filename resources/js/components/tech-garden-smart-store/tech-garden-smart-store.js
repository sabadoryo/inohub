import angular from "angular";

angular
    .module('app')
    .component('techGardenSmartStore', {
        template: require('./tech-garden-smart-store.html'),
        controller: ['$http', 'notify', '$uibModal', controller],
        bindings: {
            //
        }
    });

function controller($http, notify, $uibModal) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        getTasksList();
        getSolutionsList();
    };

	function getTasksList() {
	    $http
            .get('/tech-garden/smart-store/get-tasks-list')
            .then(
                function (response) {
                    $ctrl.tasks = response.data.tasks;
                },
                function (error) {

                }
            );
    }

    function getSolutionsList() {
        $http
            .get('/tech-garden/smart-store/get-solutions-list')
            .then(
                function (response) {
                    $ctrl.solutions = response.data.solutions;
                },
                function (error) {

                }
            );
    }

    $ctrl.openApplicationModal = function () {
	    $uibModal
            .open({
                component: 'applicationModal',
                resolve: {
                    entityType: function () {
                        return 'smart-store';
                    },
                    entityId: function () {
                        return null;
                    }
                }
            })
            .result
            .then(function () {

            });
    };
}
