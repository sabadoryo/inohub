import angular from "angular";

angular
    .module('app')
    .component('astanaHubPrograms', {
        template: require('./astana-hub-programs.html'),
        controller: [controller],
        bindings: {
            'programs': '<'
        }
    });

function controller() {

	let $ctrl = this;
    $ctrl.programList = [];
	$ctrl.$onInit = function () {
        $ctrl.programList = $ctrl.programs
        console.log($ctrl.programList)
    };
}
