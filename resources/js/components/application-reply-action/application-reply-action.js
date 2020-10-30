import angular from "angular";

angular
    .module('app')
    .component('applicationReplyAction', {
        template: require('./application-reply-action.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.message = null;

	$ctrl.$onInit = function () {
	    $ctrl.app = $ctrl.resolve.application;
        $ctrl.action = $ctrl.resolve.action;
    };

	$ctrl.submit = () => {
	    if ($ctrl.action === 'accept') {
            $http
                .post(`/control-panel/applications/${$ctrl.app.id}/accept`, {
                    message: $ctrl.message,
                })
                .then(
                    res => {
                        $ctrl.close({
                            $value: {
                                status: 'success',
                            }
                        });
                    },
                    err => {
                        $ctrl.close({
                            $value: {
                                status: 'fail',
                                message: err.data.message
                            }
                        });
                    }
                );
        } else if ($ctrl.action === 'reject') {
            $http
                .post(`/control-panel/applications/${$ctrl.app.id}/reject`, {
                    message: $ctrl.message,
                })
                .then(
                    res => {
                        $ctrl.close({
                            $value: {
                                status: 'success',
                            }
                        });
                    },
                    err => {
                        $ctrl.close({
                            $value: {
                                status: 'fail',
                                message: err.data.message
                            }
                        });
                    }
                );
        }
    };
}
