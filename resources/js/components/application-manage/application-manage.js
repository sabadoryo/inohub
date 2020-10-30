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
    $ctrl.canEdit = false;

    $ctrl.$onInit = function () {

        if ($ctrl.application.manager_id === Auth.user().id) {
            $ctrl.canEdit = true;
        }

        if ($ctrl.application.status !== 'open' && $ctrl.application.status !== 'process') {
            $ctrl.canEdit = false;
        }

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
            $ctrl.chatSection = window.angular.element(document.getElementById('chatSectionScrollDiv'));
            $ctrl.historySectionScrollDiv = window.angular.element(document.getElementById('historySectionScrollDiv'));
            $ctrl.chatSection.scrollTo(0, $ctrl.chatSection[0].scrollHeight);
            $ctrl.historySectionScrollDiv.scrollTo(0, $ctrl.historySectionScrollDiv[0].scrollHeight);
        });
    };

    $ctrl.takeForProcessing = function () {
        $http
            .post(`/control-panel/applications/${$ctrl.application.id}/take-for-processing`)
            .then(
                res => {
                    $ctrl.application.manager = Auth.user();
                    $ctrl.canEdit = true;
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
            .then(data => {
                    if (data.status === 'success') {
                        if (action === 'reject') {
                            Swal.fire('Отлично', 'Заявка успешно отклонена', 'success');
                        } else {
                            Swal
                                .fire('Отлично', 'Заявка успешно принята', 'success')
                                .then(
                                    function () {
                                        let url = '/';

                                        if ($ctrl.application.entity_model == 'App\\Module') {
                                            if ($ctrl.application.entity.slug === 'astanahub_membership') {
                                                url = `/control-panel/members/create?application_id=${$ctrl.application.id}`;
                                            } else if ($ctrl.application.entity.slug === 'smart-store-input-solution') {
                                                url = `/control-panel/sm/solutions/create?application_id=${$ctrl.application.id}`;
                                            } else if ($ctrl.application.entity.slug === 'smart-store-input-task') {
                                                url = `/control-panel/sm/tasks/create?application_id=${$ctrl.application.id}`;
                                            } else if ($ctrl.application.entity.slug === 'corp-task') {
                                                url = `/control-panel/corp-tasks/create?application_id=${$ctrl.application.id}`;
                                            }
                                        } else if ($ctrl.application.entity_model == 'App\\CorpTask') {
                                            url = `/control-panel/corp-task-solutions/create?application_id=${$ctrl.application.id}`;
                                        } else if ($ctrl.application.entity_model == 'App\\User') {
                                            url = `/control-panel/hub-space-tenants/create?application_id=${$ctrl.application.id}`;
                                        } else if ($ctrl.application.entity_model == 'App\\Program') {
                                            url = `/control-panel/programs/${$ctrl.application.entity_id}/members/create?application_id=${$ctrl.application.id}`;
                                        }

                                        window.location.href = url;
                                    }
                                )
                        }
                    } else if (data.status === 'fail') {
                        Swal.fire('Ошибка', data.message, 'error');
                    }
                },
            )
    }

}

