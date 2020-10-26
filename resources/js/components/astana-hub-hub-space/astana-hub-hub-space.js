import angular from "angular";

angular
    .module('app')
    .component('astanaHubHubSpace', {
        template: require('./astana-hub-hub-space.html'),
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