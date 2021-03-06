import angular from "angular";

angular
    .module('app')
    .component('techGardenSmartStore', {
        template: require('./tech-garden-smart-store.html'),
        controller: ['$http', 'notify', '$uibModal', 'applicationWindow', 'Auth', controller],
        bindings: {
            //
        }
    });

function controller($http, notify, $uibModal, applicationWindow, Auth) {

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

    $ctrl.openApplicationModalForSolution = function () {
        if (!Auth.user()) {
            Auth
                .openAuthModal({to: () => 'applicationWindow'})
                .result
                .then(
                    res => {
                        openAppWindow();
                    }
                );
        } else {
            openAppWindow();
        }

        function openAppWindow() {
            applicationWindow.open({
                resolve: {
                    entityType: 'smart-store-input-solution',
                    entityId: null,
                }
            });
        }
    };

    $ctrl.openApplicationModalForTask = function () {
        if (!Auth.user()) {
            Auth
                .openAuthModal({to: () => 'applicationWindow'})
                .result
                .then(
                    res => {
                        openAppWindow();
                    }
                );
        } else {
            openAppWindow();
        }

        function openAppWindow() {
            applicationWindow.open({
                resolve: {
                    entityType: 'smart-store-input-task',
                    entityId: null,
                }
            });
        }
    };
}
