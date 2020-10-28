import angular from "angular";

angular
    .module('app')
    .component('applicationManage', {
        template: require('./application-manage.html'),
        controller: ['$http', 'Auth', '$uibModal', controller],
        bindings: {
            application: '<',
        }
    });
    
function controller($http, Auth, $uibModal) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        console.log($ctrl.application);
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