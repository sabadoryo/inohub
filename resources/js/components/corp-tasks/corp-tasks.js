import angular from "angular";

angular
    .module('app')
    .component('corpTasks', {
        template: require('./corp-tasks.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            message: '@'
        }
    });

function controller($http, notify) {

	let $ctrl = this;

    $ctrl.$onInit = function () {
        if ($ctrl.message) {
            notify({
                message: $ctrl.message,
                duration: 2000,
                position: 'top',
                classes: 'alert-success'
            });
        }
        getTasksList();
    };

	function getTasksList() {
	    $http
            .get('/control-panel/corp-tasks/get-list')
            .then(
                function (response) {
                    $ctrl.tasks = response.data.tasks;
                },
                function (error) {
                    // notify({
                    //     message: error.data.message,
                    //     duration: 2000,
                    //     position: 'top-right',
                    //     classes: 'alert-danger'
                    // });
                }
            )
    }

    $ctrl.removeTask = function (id, name) {
        if (confirm(`Вы уверены, что хотите удалить задачу ${name}?`)) {
            $ctrl.loading = true;

            $http
                .post(`/control-panel/corp-tasks/${id}/remove`)
                .then(
                    function (response) {
                        notify({
                            message: `Задача ${name} успешно удалена`,
                            duration: 2000,
                            position: 'top',
                            classes: 'alert-success'
                        });
                        $ctrl.loading = false;

                        getTasksList();
                    },
                    function (error) {
                        notify({
                            message: error.data.message,
                            duration: 2000,
                            position: 'top',
                            classes: 'alert-danger'
                        });

                        $ctrl.loading = false;
                    }
                )
        }
    };
}
