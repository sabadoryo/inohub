import angular from "angular";

angular
    .module('app')
    .component('astanaHubAbout', {
        template: require('./astana-hub-about.html'),
        controller: ['$uibModal', controller],
        bindings: {
            programs: '<'
        }
    });
    
function controller($uibModal) {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
        console.log($ctrl.programs);
    };

	$ctrl.openApplicationModal = () => {
        $uibModal
            .open({
                component: 'applicationModal',
                resolve: {
                    entityType: () => 'member',
                    entityId: () => null,
                }
            })
            .result
            .then(
                res => {

                },
                err => {

                }
            );
    };

}