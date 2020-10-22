import angular from "angular";

angular
    .module('app')
    .component('astanaHubPage', {
        template: require('./astana-hub-page.html'),
        controller: [controller],
        bindings: {
            programs: '<'
        }
    });
    
function controller() {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
        console.log($ctrl.programs);
    };
}