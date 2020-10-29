import angular from "angular";

angular
    .module('app')
    .component('corpTasksCreate', {
        template: require('./corp-tasks-create.html'),
        controller: ['Upload', 'notify', 'moment', controller],
        bindings: {
            //
        }
    });

function controller(Upload, notify, moment) {

    let $ctrl = this;

    $ctrl.companyName = null;
    $ctrl.title = null;
    $ctrl.description = null;
    $ctrl.deadline = null;
    $ctrl.image = null;

    $ctrl.$onInit = function () {
        if ($ctrl.app) {
            setAppData();
        }
    };

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

        let title = fields.find(v => v.label === 'Название задачи');

        if (title) {
            $ctrl.title = title.value;
        }

        let description = fields.find(v => v.label === 'Описание задачи');

        if (description) {
            $ctrl.description = description.value;
        }

        let image = fields.find(v => v.label === 'Изображение');

        if (image) {
            $ctrl.image = image.value[0];
            $ctrl.imageType = 'string';
        }

        let deadline = fields.find(v => v.label === 'Конец приема заявок');

        if (deadline) {
            $ctrl.deadline = deadline.value;
        }
    }

    $ctrl.imageChanged = function () {
        $ctrl.imageType = 'file';
    };

    $ctrl.submit = function () {

        if (!$ctrl.image) {
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
            deadline: moment($ctrl.deadline).format('YYYY-MM-DD')
        };

        if ($ctrl.imageType === 'string') {
            params['imagePath'] = $ctrl.image;
        } else {
            params['image'] = $ctrl.image;
        }

        Upload
            .upload({
                url: '/control-panel/corp-tasks',
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
