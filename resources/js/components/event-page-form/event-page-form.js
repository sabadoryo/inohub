import angular from "angular";

angular
    .module('app')
    .component('eventPageForm', {
        template: require('./event-page-form.html'),
        controller: ['$uibModal', controller],
        bindings: {
            event: '<',
        }
    });
    
function controller($uibModal) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
    };

    $ctrl.openToPublishModal = () => {
        $uibModal
            .open({
                component: 'eventToPublishModal',
                resolve: {
                    event: function () {
                        return $ctrl.event;
                    }
                }
            })
            .result
            .then(
                res => {
                    window.Swal.fire({
                        icon: 'success',
                        title: 'Опубликовано',
                        timer: 2000,
                        showConfirmButton: false,
                    });
                },
                err => {

                }
            );
    };
}