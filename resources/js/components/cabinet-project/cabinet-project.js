import angular from "angular";

angular
    .module('app')
    .component('cabinetProject', {
        template: require('./cabinet-project.html'),
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