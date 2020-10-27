import angular from "angular";

angular
    .module('app')
    .component('applicationModal', {
        template: require('./application-modal.html'),
        controller: ['Auth', '$rootScope', 'Upload', '$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller(Auth, $rootScope, Upload, $http) {

    let $ctrl = this;


    $ctrl.curForm = 0;
    $rootScope.$on('UserAuthenticated', (event, data) => {
        $ctrl.user = data.user;
    });

    $ctrl.fullName = null;
    $ctrl.email = null;

    $ctrl.$onInit = function () {
        $ctrl.user = Auth.user();
        $ctrl.entityType = $ctrl.resolve.entityType;
        $ctrl.entityId = $ctrl.resolve.entityId;
        $ctrl.getForms();

    };

    $ctrl.getForms = function () {
        $http
            .get(`/astana-hub/programs/${$ctrl.entityId}/get-forms`)
            .then(
                res => {
                    $ctrl.forms = res.data.forms;
                    $ctrl.forms.forEach(form => {
                        form.fields.forEach(field => {
                            field.value = null;
                        });
                    });
                },
                err => {
                }
            )
    };

    $ctrl.openLoginModal = () => {
        Auth.openLoginModal();
    };

    $ctrl.selectOtherOptionSelected = function (field) {
        field.otherOptionSelected = field.value.val === 'Свой вариант';
        console.log(field);
    };

    $ctrl.checkboxOtherOptionSelected = function (field) {
        field.other_option_selected = true;
        console.log(field);
    };

    $ctrl.validateFile = function (files, file, newFiles, duplicateFiles, invalidFiles, event, field) {
        console.log(field.value);
        if (files.length > field.max_files_count) {
            alert('Выбрано сликшмо много файлов, максимальное количество:' + field.max_files_count);
            field.value = [];
        }
    };

    $ctrl.removeFile = function (field, index) {
        console.log(field, index);
        field.value.splice(index, 1);
    };

    $ctrl.submit = function (ind) {

        let ch = true;
        if (ind != $ctrl.forms.length - 1) {
            $ctrl.forms[ind].fields.forEach(field => {
                if (field.type === 'file') {
                    if (field.value.length === 0) {
                        alert('Поле c загрузкой файла - является обязательным, пожалуйста предоставьте его.');
                        ch = false;
                    }
                }
            });
            if (ch === false) {
                return;
            } else {
                $ctrl.curForm += 1;
                return;
            }
        }

        let forms = [];

        $ctrl.forms.forEach(form => {
            let fields = [];

            form.fields.forEach(field => {

                if (field.type === 'checkbox') {
                    let value = [];
                    if (field.otherOptionValue) {
                        value.push(field.otherOptionValue);
                    }
                    field.options.forEach(option => {
                        if (option.selected) {
                            value.push(option.val);
                        }
                    });
                    fields.push({id: field.id, value: value, type: field.type});

                } else {

                    if (field.type === 'select') {
                        fields.push({
                            id: field.id,
                            value: field.otherOptionValue ? field.otherOptionValue : field.value.val,
                            type: field.type
                        });
                    } else {
                        fields.push({
                            id: field.id,
                            value: field.otherOptionValue ? field.otherOptionValue : field.value,
                            type: field.type
                        });
                    }
                }
            });

            forms.push({id: form.id, fields});
        });
        console.log(forms);
        Upload

            .upload({
                url: '/applications',
                data: {
                    entity_type: $ctrl.entityType,
                    entity_id: $ctrl.entityId,
                    forms
                }
            })
            .then(
                res => {
                    $ctrl.curForm = 'finished';
                },
                err => {

                }
            );
    };

}
