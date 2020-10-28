import angular from "angular";

angular
    .module('app')
    .component('applicationStatus', {
        template: require('./application-status.html'),
        controller: ['$http', 'Auth', 'moment', '$uibModal', 'Upload', controller],
        bindings: {
            app: '<'
        }
    });

function controller($http, Auth, moment, $uibModal, Upload) {

    let $ctrl = this;

    $ctrl.message = '';
    $ctrl.attachedFiles = [];

    $ctrl.$onInit = function () {
        $ctrl.user = Auth.user();
        console.log($ctrl.app);
    };

    $ctrl.sendMessage = () => {
        $http
            .post(`/applications/${$ctrl.app.id}/send-message`, {
                message: $ctrl.message
            })
            .then(
                function (res) {
                    $ctrl.app.messages.push({
                        id: res.data.id,
                        user: $ctrl.user,
                        message: $ctrl.message,
                        created_at: moment(),
                    });

                    $ctrl.message = null;
                },
                function () {

                }
            )
    };

    $ctrl.toggleEditing = function (appForm) {
        appForm.isEditing = !appForm.isEditing;
        if (appForm.isEditing) {
            appForm.fields.forEach(field => {
                if (field.form_field.type === 'select') {
                    let isExitsInOptions = field.form_field.options.map(e => e.val).indexOf(field.value);
                    if (isExitsInOptions !== -1) {
                        field.editValue = field.form_field.options[isExitsInOptions];
                    } else {
                        field.editValue = field.form_field.options[field.form_field.options.length - 1];
                        field.editValueOtherOption = field.value;
                    }
                } else if (field.form_field.type === 'radio') {
                    field.value = field.value.toString();
                    let isExitsInOptions = field.form_field.options.map(e => e.val).indexOf(field.value);
                    if (isExitsInOptions !== -1) {
                        field.editValue = field.form_field.options[isExitsInOptions];
                    } else {
                        field.editValueOtherOption = field.value;
                        field.value = 'Свой вариант';
                    }
                } else if (field.form_field.type === 'checkbox') {
                    if (Array.isArray(field.value)) {
                        field.value.forEach(val => {
                            let isExitsInOptions = field.form_field.options.map(e => e.val).indexOf(val);
                            if (isExitsInOptions === -1) {
                                field.other_option_selected = true;
                                field.editValueOtherOption = val;
                            } else {
                                field.form_field.options[isExitsInOptions].isSelected = true;
                            }
                        });
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
        }
    };

    $ctrl.updateForm = function (appForm) {
        console.log(appForm);

        let fields = [];

        appForm.fields.forEach(field => {
            if (field.form_field.type === 'radio') {
                fields.push({
                    id: field.id,
                    value: field.value === 'Свой вариант' ? field.editValueOtherOption : field.value,
                    type: field.form_field.type,
                });
            } else if (field.form_field.type === 'select') {
                fields.push({
                    id: field.id,
                    value: field.editValue.val === 'Свой вариант' ? field.editValueOtherOption : field.editValue.val,
                    type: field.form_field.type,
                });
            } else if (field.form_field.type === 'checkbox') {
                let values = [];

                if (field.other_option_selected) {
                    values.push(field.editValueOtherOption)
                }
                field.form_field.options.forEach(option => {
                    if (option.isSelected) {
                        values.push(option.val);
                    }
                });
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
                    value: field.editValue,
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
                    $ctrl.app.actions.unshift({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'application_updated',
                        additional_data: res.data.changes,
                        created_at: moment(),
                    });
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
                }
            })
            .then(
                res => {
                    $ctrl.app.actions.unshift({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'application_user_message',
                        message: $ctrl.message,
                        created_at: moment(),
                        additional_data: res.data,
                    });

                    console.log(res);

                    $ctrl.message = '';
                    $ctrl.attachedFiles = [];
                },
                err => {

                }
            );

    };

    $ctrl.removeFile = function (field, index) {
        console.log(field, index);
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
    }

    $ctrl.removeAttachedFile = function (index) {
        $ctrl.attachedFiles.splice(index, 1);
    }
}
