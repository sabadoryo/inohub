import angular from "angular";

angular
    .module('app')
    .component('astanaHubPrograms', {
        template: require('./astana-hub-programs.html'),
        controller: [controller],
        bindings: {
            //
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        //
    };
}