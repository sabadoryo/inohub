import angular from "angular";

angular
    .module('app')
    .component('corpTaskSolutions', {
        template: require('./corp-task-solutions.html'),
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
        getSolutionsList();
    };

    function getSolutionsList() {
        $http
            .get('/control-panel/corp-task-solutions/get-list')
            .then(
                function (response) {
                    $ctrl.solutions = response.data.solutions;
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

    $ctrl.removeSolution = function (id, name) {
        if (confirm(`Вы уверены, что хотите удалить решение для ${name}?`)) {
            $ctrl.loading = true;

            $http
                .post(`/control-panel/corp-task-solutions/${id}/remove`)
                .then(
                    function (response) {
                        notify({
                            message: `Решение ${name} успешно удалено`,
                            duration: 2000,
                            position: 'top',
                            classes: 'alert-success'
                        });
                        $ctrl.loading = false;

                        getSolutionsList();
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
