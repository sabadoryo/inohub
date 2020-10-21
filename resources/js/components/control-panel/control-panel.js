import angular from "angular";

angular
    .module('app')
    .component('controlPanel', {
        template: require('./control-panel.html'),
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