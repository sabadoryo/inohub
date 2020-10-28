import angular from "angular";

angular
    .module('app')
    .component('techGardenAbout', {
        template: require('./tech-garden-about.html'),
        controller: ['$uibModal', controller],
        bindings: {
            //
        }
    });
    
function controller($uibModal) {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        //
    };

    $ctrl.openApplicationModal = () => {
        $uibModal
            .open({
                component: 'applicationModal',
                resolve: {
                    entityType: () => 'astanahub_membership',
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