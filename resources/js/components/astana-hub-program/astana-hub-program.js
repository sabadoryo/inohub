import angular from "angular";

angular
    .module('app')
    .component('astanaHubProgram', {
        template: require('./astana-hub-program.html'),
        controller: ['$uibModal', 'applicationWindow', controller],
        bindings: {
            program: '<',
        }
    });

function controller($uibModal, applicationWindow) {

    let $ctrl = this;

    $ctrl.$onInit = function () {
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
