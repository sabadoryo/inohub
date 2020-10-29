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

        let req = null;

        if ($ctrl.entityType == 'astanahub_membership') {
            req = $http.get('/get-forms', {
                params: {
                    type: 'astanahub_membership'
                }
            });
        } else if ($ctrl.entityType == 'program') {
            req = $http.get('/get-forms', {
                params: {
                    type: 'program',
                    program_id: $ctrl.entityId,
                }
            });
        } else if ($ctrl.entityType === 'smart-store-input-solution') {
            req = $http.get('/get-forms', {
                params: {
                    type: 'smart-store-input-solution',
                }
            });
        } else if ($ctrl.entityType === 'smart-store-input-task') {
            req = $http.get('/get-forms', {
                params: {
                    type: 'smart-store-input-task',
                }
            });
        } else if ($ctrl.entityType === 'corp-task') {
            req = $http.get('/get-forms', {
                params: {
                    type: 'corp-task',
                }
            });
        } else if ($ctrl.entityType === 'corp-task-solution') {
            req = $http.get('/get-forms', {
                params: {
                    type: 'corp-task-solution',
                }
            });
        }

        if (req) {
            req.then(
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
            );
        }
    };

    $ctrl.openLoginModal = () => {
        Auth.openAuthModal();
    };

    $ctrl.selectOtherOptionSelected = function (field) {
        field.otherOptionSelected = field.value.val === 'Свой вариант';
    };

    $ctrl.checkboxOtherOptionSelected = function (field) {
        field.other_option_selected = true;
    };

    $ctrl.validateFile = function (files, file, newFiles, duplicateFiles, invalidFiles, event, field) {
        if (files.length > field.max_files_count) {
            alert('Выбрано сликшмо много файлов, максимальное количество:' + field.max_files_count);
            field.value = [];
        }
    };

    $ctrl.isFileRequired = function (field) {
        return !!(field.is_required && (!field.value || field.value.length <= 0));
    };

    $ctrl.removeFile = function (field, index) {
        field.value.splice(index, 1);
    };

    $ctrl.submit = function (ind) {

        let ch = true;
        $ctrl.forms[ind].fields.forEach(field => {
            if (field.type === 'file') {
                if ($ctrl.isFileRequired(field)) {
                    alert('Поле с загрузукой файла является обязательным пожалуйста предоставьте его');
                    ch = false;
                }
            }
        });
        if (ind != $ctrl.forms.length - 1 && ch === true) {
            $ctrl.curForm += 1;
            return;
        }
        if (ch === false) {
            return;
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
        Upload

            .upload({
                url: '/applications',
                data: {
                    entity_type: $ctrl.entityType,
                    entity_id: $ctrl.entityId || undefined,
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
