import angular from "angular";

angular
    .module('app')
    .component('corpTasksEdit', {
        template: require('./corp-tasks-edit.html'),
        controller: ['Upload', 'notify', 'moment', controller],
        bindings: {
            task: '<'
        }
    });

function controller(Upload, notify, moment) {

    let $ctrl = this;

    $ctrl.image = null;

    $ctrl.$onInit = function () {
        $ctrl.companyName = $ctrl.task.company_name;
        $ctrl.title = $ctrl.task.title;
        $ctrl.description = $ctrl.task.description;
        $ctrl.deadline = moment($ctrl.task.deadline).toDate();
        $ctrl.imagePath = $ctrl.task.image;
    };

    $ctrl.submit = function () {

        if (!$ctrl.image && !$ctrl.imagePath) {
            notify({
                message: 'Добавьте изображение',
                duration: 2000,
                position: 'top',
                classes: 'alert-danger'
            });

            return;
        }

        let params = {
            companyName: $ctrl.companyName,
            title: $ctrl.title,
            description: $ctrl.description,
            deadline: moment($ctrl.deadline).format('YYYY-MM-DD'),
            imagePath: $ctrl.imagePath
        };

        if ($ctrl.image) {
            params['image'] =  $ctrl.image;
        }

        Upload
            .upload({
                url: `/control-panel/corp-tasks/${$ctrl.task.id}/update`,
                data: params
            })
            .then(
                res => {
                    window.location.href = `/control-panel/corp-tasks?success_message=${res.data.message}`;
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
