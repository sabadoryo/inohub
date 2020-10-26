import angular from "angular";

angular
    .module('app')
    .component('astanaHubProgram', {
        template: require('./astana-hub-program.html'),
        controller: ['$uibModal', controller],
        bindings: {
            program: '<',
        }
    });
    
function controller($uibModal) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
    };

	$ctrl.openApplicationModal = function () {
        $uibModal
            .open({
                component: 'applicationModal',
                resolve: {
                    entityType: () => {
                        return 'program';
                    },
                    entityId: () => {
                        return $ctrl.program.id;
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

}