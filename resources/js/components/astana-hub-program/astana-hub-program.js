import angular from "angular";

angular
    .module('$sce', 'app')
    .component('astanaHubProgram', {
        template: require('./astana-hub-program.html'),
        controller: ['$uibModal', controller],
        bindings: {
            program: '<',
            passport: '<'
        }
    });

function controller($sce, $uibModal) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.content = $ctrl.passport.content;
        // $ctrl.content = $sce.trustAsHtml($ctrl.passport.content);
	    console.log($ctrl.passport)
    };

	$ctrl.openApplicationModal = function () {
	    console.log('test');

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
