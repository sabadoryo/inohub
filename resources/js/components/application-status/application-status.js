import angular from "angular";

angular
    .module('app')
    .component('applicationStatus', {
        template: require('./application-status.html'),
        controller: ['$http', 'Auth', 'moment', controller],
        bindings: {
            app: '<'
        }
    });
    
function controller($http, Auth, moment) {
 
	let $ctrl = this;

	$ctrl.message = null;

	$ctrl.$onInit = function () {
	    $ctrl.user = Auth.user();
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
                field.editValue = field.value;
            });
        }
    };

	$ctrl.updateForm = function (appForm) {

	    let fields = [];

	    appForm.fields.forEach(field => {
            fields.push({
                id: field.id,
                value: field.editValue
            });
        });

	    $http
            .post(`/cabinet/applications/${$ctrl.app.id}/update-form`, {
                application_form_id: appForm.id,
                fields: fields
            })
            .then(
                res => {
                    $ctrl.app.actions.unshift({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'update',
                        additional_data: res.data.changes,
                        created_at: moment(),
                    });
                },
                err => {

                }
            );
    };

	$ctrl.sendMessage = () => {

        $http
            .post(`/cabinet/applications/${$ctrl.app.id}/send-message`, {
                message: $ctrl.message
            })
            .then(
                res => {
                    $ctrl.app.actions.unshift({
                        id: res.data.action_id,
                        user: Auth.user(),
                        name: 'send message',
                        message: $ctrl.message,
                        created_at: moment(),
                    });

                    $ctrl.message = null;
                },
                err => {

                }
            );

    };
}