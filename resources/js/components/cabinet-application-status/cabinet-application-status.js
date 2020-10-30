import angular from "angular";

angular
    .module('app')
    .component('cabinetApplicationStatus', {
        template: require('./cabinet-application-status.html'),
        controller: ['$http', 'Auth', 'moment', '$uibModal', 'Upload', '$timeout', controller],
        bindings: {
            app: '<'
        }
    });

function controller($http, Auth, moment, $uibModal, Upload, $timeout) {

    let $ctrl = this;

    $ctrl.formsVisible = true;

    $ctrl.message = '';
    $ctrl.attachedFiles = [];

    $ctrl.$onInit = function () {
        $timeout(function () {
            $ctrl.app.forms.forEach(form => {
                form.fields.forEach(field => {
                    if (field.form_field.other_option) {
                        field.form_field.options.push({val: 'Свой вариант'});
                    }
                    if (field.form_field.type === 'select') {
                        field.value = field.value.toString();
                        let isExitsInOptions = field.form_field.options.map(e => e.val).indexOf(field.value);
                        if (isExitsInOptions !== -1) {
                            field.value = field.form_field.options[isExitsInOptions];
                        } else {
                            field.otherOptionValue = field.value;
                            field.value = field.form_field.options[field.form_field.options.length - 1];
                        }
                    }
                    if (field.form_field.type === 'radio') {
                        field.value = field.value.toString();
                        let isExitsInOptions = field.form_field.options.map(e => e.val).indexOf(field.value);
                        if (isExitsInOptions !== -1) {
                            field.value = field.form_field.options[isExitsInOptions].val;
                        } else {
                            field.otherOptionValue = field.value;
                            field.value = field.form_field.options[field.form_field.options.length - 1].val;
                        }
                    }
                    if (field.form_field.type === 'checkbox') {
                        if (Array.isArray(field.value)) {
                            let selectedOptions = {};
                            field.value.forEach(val => {
                                let isExitsInOptions = field.form_field.options.map(e => e.val).indexOf(val);
                                if (isExitsInOptions === -1) {
                                    field.other_option_selected = true;
                                    field.otherOptionValue = val;
                                    selectedOptions['Свой вариант'] = true;
                                } else {
                                    selectedOptions[val] = true;
                                }
                            });
                            field.value = selectedOptions;
                        } else {
                            field.form_field.options.forEach(option => {
                                if (option.val === field.value) {
                                    option.isSelected = true;
                                    option.selected = true;
                                }
                            });
                        }
                    } else {
                        field.editValue = field.value;
                    }
                });
            });
            $ctrl.app.actions.action.forEach(act => {
                if (act.name === 'application_updated') {
                    act.additional_data.forEach(data => {
                        data.new_value_stringified = null;
                        data.old_value_stringified = null;

                        if (data.type === 'file') {
                            let fileName;
                            let filePath;
                            let new_data = {};
                            let old_data = {};
                            for (let i = 0; i < data.new_value.length; i++) {
                                fileName = data.new_value_names[i];
                                filePath = data.new_value[i];
                                new_data[fileName] = filePath;
                            }
                            data.new_data = new_data;
                            for (let i = 0; i < data.old_value.length; i++) {
                                fileName = data.old_value_names[i];
                                filePath = data.old_value[i];
                                old_data[fileName] = filePath;
                            }
                            data.old_data = old_data;
                        } else {
                            if (Array.isArray(data.new_value)) {
                                data.new_value_stringified = data.new_value.join(',');
                            }
                            if (Array.isArray(data.old_value)) {
                                data.old_value_stringified = data.old_value.join(',');
                            }
                        }
                    })
                }
            });
            $ctrl.chatSection = window.angular.element(document.getElementById('chatSectionScrollDiv'));
            $ctrl.chatSection.scrollTo(0, $ctrl.chatSection[0].scrollHeight);
        });
        console.log($ctrl.app);
    };

    $ctrl.enableEditing = function (appForm) {
        appForm.isEditing = true;
        appForm.fields.forEach(field => {
            if (field.form_field.type === 'checkbox') {
                field.oldValue = _.cloneDeep(field.value);
            } else {
                field.oldValue = field.value;
                field.editValue = field.value;
            }
        });
    };

    $ctrl.disableEditing = function (appForm) {
        appForm.isEditing = false;
        appForm.fields.forEach(field => {
            if (field.form_field.type === 'checkbox') {
                field.value = {};
                field.value = field.oldValue;
            } else {
                field.value = field.oldValue;
            }
        });
    };

    $ctrl.updateForm = function (appForm) {

        let fields = [];

        appForm.fields.forEach(field => {
            if (field.form_field.type === 'radio') {
                fields.push({
                    id: field.id,
                    value: field.value === 'Свой вариант' ? field.otherOptionValue : field.value,
                    type: field.form_field.type,
                });
            } else if (field.form_field.type === 'select') {
                fields.push({
                    id: field.id,
                    value: field.value.val === 'Свой вариант' ? field.otherOptionValue : field.value.val,
                    type: field.form_field.type,
                });
            } else if (field.form_field.type === 'checkbox') {
                let values = [];

                for (let option in field.value) {
                    if (Object.prototype.hasOwnProperty.call(field.value, option)) {
                        if (field.value[option]) {
                            if (option === 'Свой вариант') {
                                values.push(field.otherOptionValue);
                            } else {
                                values.push(option);
                            }
                        }
                    }
                }
                fields.push({
                    id: field.id,
                    value: values,
                    type: field.form_field.type,
                });
            } else if (field.form_field.type === 'file') {
                fields.push({
                    id: field.id,
                    value: field.value.length > 0 ? field.value : null,
                    type: field.form_field.type,
                });

            } else {
                fields.push({
                    id: field.id,
                    value: field.value,
                    type: field.form_field.type,
                });
            }
        });
        Upload
            .upload({
                url: `/cabinet/applications/${$ctrl.app.id}/update-form`,
                data: {
                    application_form_id: appForm.id,
                    fields: fields
                }
            })
            .then(
                res => {
                    if (!$ctrl.app.actions.action) {
                        $ctrl.app.actions.action = [];
                    }
                    $ctrl.app.actions.action.push({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'application_updated',
                        additional_data: res.data.changes,
                        created_at: moment(),
                    });
                    console.log(res);
                    Swal.fire(
                        'Заявка успешно обновлена',
                        '',
                        'success'
                    ).then(res => {

                    });
                    appForm.isEditing = false;
                },
                err => {

                }
            );
    };

    $ctrl.sendMessage = () => {

        Upload
            .upload({
                url: `/cabinet/applications/${$ctrl.app.id}/send-message`,
                data: {
                    message: $ctrl.message,
                    attachedFiles: $ctrl.attachedFiles,
                    messageFrom: 'user',
                }
            })
            .then(
                res => {
                    if (!$ctrl.app.actions.message) {
                        $ctrl.app.actions.message = [];
                    }
                    $ctrl.app.actions.message.push({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'application_user_message',
                        message: $ctrl.message,
                        created_at: moment(),
                        additional_data: res.data,
                    });
                    $timeout(function () {
                        $ctrl.chatSection = window.angular.element(document.getElementById('chatSectionScrollDiv'));
                        $ctrl.chatSection.scrollTo(0, $ctrl.chatSection[0].scrollHeight);
                    });
                    $ctrl.message = '';
                    $ctrl.attachedFiles = [];
                },
                err => {

                }
            );

    };

    $ctrl.removeFile = function (field, index) {
        field.value.splice(index, 1);
    };

    $ctrl.openDetails = function (action) {
        $uibModal
            .open({
                component: 'applicationActionDetailsModal',
                size: 'lg',
                resolve: {
                    action: () => {
                        return action;
                    }
                }
            })
            .result
            .then(
                function (result) {

                },
                function () {

                }
            );
    };

    $ctrl.removeAttachedFile = function (index) {
        $ctrl.attachedFiles.splice(index, 1);
    };

    $ctrl.toggleForms = function () {
        $ctrl.formsVisible = !$ctrl.formsVisible;
    };

    $ctrl.goToApplications = function () {
        window.location = '/cabinet/applications';
    }
}

