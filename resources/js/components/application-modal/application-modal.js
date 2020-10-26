import angular from "angular";

angular
    .module('app')
    .component('applicationModal', {
        template: require('./application-modal.html'),
        controller: ['Auth', '$rootScope', '$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller(Auth, $rootScope, $http) {
 
	let $ctrl = this;

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

	$ctrl.submit = function (ind) {

	    if (ind != $ctrl.forms.length - 1) {
            return;
        }

	    let forms = [];

	    $ctrl.forms.forEach(form => {
	        let fields = [];

	        form.fields.forEach(field => {
                fields.push({id: field.id, value: field.value});
            });

	        forms.push({id: form.id, fields});
        });

	    $http

            .post('/applications', {
                entity_type: $ctrl.entityType,
                entity_id: $ctrl.entityId,
                forms
            })
            .then(
                res => {

                },
                err => {

                }
            );
    };

}