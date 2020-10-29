import angular from "angular";

angular
    .module('app')
    .component('corpTaskSolutionsCreate', {
        template: require('./corp-task-solutions-create.html'),
        controller: ['Upload', '$http', 'notify', controller],
        bindings: {
            app: '<',
            task: '<'
        }
    });

function controller(Upload, $http, notify) {

    let $ctrl = this;

    $ctrl.companyName = null;
    $ctrl.companySite = null;
    $ctrl.description = null;
    $ctrl.taskId = null;

    $ctrl.$onInit = function () {

        getTasksList();

        if ($ctrl.app) {
            $ctrl.taskId = $ctrl.task.id;
            setAppData();
        }
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

    function setAppData() {
        let fields = [];

        $ctrl.app.forms.forEach(form => {
            form.fields.forEach(field => {
                fields.push({
                    label: field.form_field.label,
                    value: field.value
                });
            });
        });

        let companyName = fields.find(v => v.label === 'Название компании');

        if (companyName) {
            $ctrl.companyName = companyName.value;
        }

        let companySite = fields.find(v => v.label === 'Название компании');

        if (companySite) {
            $ctrl.companySite = companySite.value;
        }

        let description = fields.find(v => v.label === 'Описание задачи');

        if (description) {
            $ctrl.description = description.value;
        }
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
                url: '/control-panel/corp-task-solutions',
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
