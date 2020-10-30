import angular from "angular";

angular
    .module('app')
    .component('applicationManage', {
        template: require('./application-manage.html'),
        controller: ['$timeout', '$http', 'Auth', '$uibModal', 'Upload', 'moment', '$location','$anchorScroll' ,controller],
        bindings: {
            application: '<',
        }
    });

function controller($timeout, $http, Auth, $uibModal, Upload, moment, $location, $anchorScroll) {

    let $ctrl = this;

    $ctrl.message = '';
    $ctrl.attachedFiles = [];

    $ctrl.$onInit = function () {
        // $ctrl.test = $ctrl.application;
        $timeout(function () {
            $ctrl.application.actions.action.forEach(act => {
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
        });
    };

    $ctrl.takeForProcessing = function () {
        $http
            .post(`/control-panel/applications/${$ctrl.application.id}/take-for-processing`)
            .then(
                res => {
                    $ctrl.application.manager = Auth.user();
                    Swal.fire('Отлично', 'Данныя заявка числиться за вами', 'success');
                },
                err => {

                }
            );
    };

    $ctrl.sendMessage = () => {

        Upload
            .upload({
                url: `/cabinet/applications/${$ctrl.application.id}/send-message`,
                data: {
                    message: $ctrl.message,
                    attachedFiles: $ctrl.attachedFiles,
                    messageFrom: 'admin',
                }
            })
            .then(
                res => {
                    if (!$ctrl.application.actions.message) {
                        $ctrl.application.actions.message = [];
                    }
                    $ctrl.application.actions.message.push({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'application_admin_message',
                        message: $ctrl.message,
                        created_at: moment(),
                        additional_data: res.data,
                    });


                    $ctrl.message = '';
                    $ctrl.attachedFiles = [];
                },
                err => {

                }
            );

    };

    $ctrl.accept = () => {
        openActionModal('accept');
    };

    $ctrl.reject = () => {
        openActionModal('reject');
    };

    function openActionModal(action) {
        $uibModal
            .open({
                component: 'applicationReplyAction',
                resolve: {
                    application: () => $ctrl.application,
                    action: () => action,
                }
            })
            .result
            .then(
                res => {
                    alert('Success');
                },
                err => {

                }
            )
    }

}

