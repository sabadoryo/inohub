import angular from "angular";

angular
    .module('app')
    .component('corpTaskSolutionsEdit', {
        template: require('./corp-task-solutions-edit.html'),
        controller: ['Upload', '$http', 'notify', controller],
        bindings: {
            solution: '<'
        }
    });

function controller(Upload, $http, notify) {

    let $ctrl = this;

    $ctrl.$onInit = function () {

        $ctrl.companyName = $ctrl.solution.company_name;
        $ctrl.companySite = $ctrl.solution.company_site;
        $ctrl.description = $ctrl.solution.description;
        $ctrl.taskId = $ctrl.solution.task_id;

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
                    notify({
                        message: error.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    })
                }
            )
    }

    $ctrl.submit = function () {

        let params = {
            companyName: $ctrl.companyName,
            companySite: $ctrl.companySite,
            description: $ctrl.description,
            taskId: $ctrl.taskId
        };

        Upload
            .upload({
                url: `/control-panel/corp-task-solutions/${$ctrl.solution.id}/update`,
                data: params
            })
            .then(
                res => {
                    window.location.href = `/control-panel/corp-task-solutions?success_message=${res.data.message}`;
                },
                err => {
                    notify({
                        message: err.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    })
                }
            );
    };
}
