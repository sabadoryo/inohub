import angular from "angular";

angular
    .module('app')
    .component('astanaHubCorpInnovations', {
        template: require('./astana-hub-corp-innovations.html'),
        controller: ['applicationWindow', 'Auth', '$http', controller],
        bindings: {
            //
        }
    });

function controller(applicationWindow, Auth, $http) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        getTasksList();
    };

	function getTasksList () {
	    $http
            .get('/astana-hub/corporate-innovations/get-list')
            .then(
                function (response) {
                    $ctrl.tasks = response.data.tasks;
                }
            )
    }

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
                    entityType: 'corp-task',
                    entityId: null,
                }
            });
        }
    };
}
