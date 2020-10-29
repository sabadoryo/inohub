import angular from "angular";

angular
    .module('app')
    .component('techGardenPrograms', {
        template: require('./tech-garden-programs.html'),
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