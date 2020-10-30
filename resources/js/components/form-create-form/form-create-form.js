import angular from "angular";

angular
    .module('app')
    .component('formCreateForm', {
        template: require('./form-create-form.html'),
        controller: ['$http', 'Upload', 'notify', controller],
        bindings: {
            //
        }
    });

function controller($http, Upload, notify) {

    let $ctrl = this;

    window.t = this;

    $ctrl.filesTypes = [
        {key: 'image/*', value: 'Изображение'},
        {key: 'application/pdf', value: 'PDF'},
        {key: 'application/vnd.ms-excel', value: 'Excel'},
        {key: 'application/msword', value: 'Word'},
        {key: 'application/vnd.ms-powerpoint', value: 'Powerpoint'},
        {key: 'audio/*', value: 'Аудио'},
        {key: 'video/*', value: 'Видео'},
    ];

    $ctrl.title = null;
    $ctrl.description = null;
    $ctrl.fields = [];

    $ctrl.$onInit = function () {
        $ctrl.addField();
    };

    $ctrl.addField = function () {
        $ctrl.fields.push({
            type: 'text',
            label: null,
            isRequired: false,
            prompt: null,
            options: null,
            otherOption: false,
            maxFilesCount: null,
            fileAllows: null,
            fileTypes: null,
            exampleFiles: [],
        });
    };

    $ctrl.delField = function (ind) {
        if (confirm('Вы действительно хотите удалить поле?')) {
            $ctrl.fields.splice(ind, 1);
        }
    };

    $ctrl.fieldTypeChanged = function (field) {
        field.options = null;
        field.otherOption = false;
        field.maxFilesCount = null;
        field.fileAllows = null;
        field.fileTypes = null;

        if (field.type == 'radio' || field.type == 'checkbox' || field.type == 'select') {
            field.options = [];
            field.options.push({val: null});
        }

        if (field.type == 'file') {
            field.maxFilesCount = 1;
            field.fileAllows = 'any';
            field.fileTypes = [];
        }
    };

    $ctrl.addOption = function (field) {
        field.options.push({val: null});
    };

    $ctrl.delOption = function (field, ind) {
        field.options.splice(ind, 1);
    };

    $ctrl.submit = function () {
        $ctrl.loading = false;

        Upload
            .upload({
                headers:{'Content-Type': undefined },
                url: `/control-panel/forms`,
                data: {
                    title: $ctrl.title,
                    description: $ctrl.description,
                    fields: $ctrl.fields,
                }
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    window.location.href = '/control-panel/forms?success_message=Форма успешно создана';
                },
                err => {
                    $ctrl.loading = false;
                    notify({
                        message: err.data.message,
                        duration: 2000,
                        position: 'top-right',
                        classes: 'alert-danger'
                    });
                }
            );
    };

    $ctrl.removeFile = function (field, index) {
        field.exampleFiles.splice(index, 1);
    }
}

