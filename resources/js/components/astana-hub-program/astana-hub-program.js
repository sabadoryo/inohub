import angular from "angular";

angular
    .module('$sce', 'app')
    .component('astanaHubProgram', {
        template: require('./astana-hub-program.html'),
        controller: ['$uibModal', 'applicationWindow', controller],
        bindings: {
            program: '<',
            passport: '<'
        }
    });

function controller($sce, $uibModal,applicationWindow) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.content = $ctrl.passport.content;
        // $ctrl.content = $sce.trustAsHtml($ctrl.passport.content);
	    console.log($ctrl.passport)
    };

    $ctrl.openApplicationModal = function () {
        console.log('test');
        openAppWindow();
        function openAppWindow() {
            applicationWindow.open({
                resolve: {
                    entityType: 'program',
                    entityId: $ctrl.program.id,
                }
            });
        }
    };

}
