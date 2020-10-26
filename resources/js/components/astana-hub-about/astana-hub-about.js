import angular from "angular";

angular
    .module('app')
    .component('astanaHubAbout', {
        template: require('./astana-hub-about.html'),
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