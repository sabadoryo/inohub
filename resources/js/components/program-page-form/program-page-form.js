import angular from "angular";

angular
    .module('app')
    .component('programPageForm', {
        template: require('./program-page-form.html'),
        controller: ['$uibModal', controller],
        bindings: {
            program: '<',
        }
    });
    
function controller($uibModal) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {

    };

    $ctrl.openToPublishModal = () => {
        $uibModal
            .open({
                component: 'programToPublishModal',
                resolve: {
                    program: function () {
                        return $ctrl.program;
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