import angular from "angular";

angular
    .module('app')
    .component('astanaHubResources', {
        template: require('./astana-hub-resources.html'),
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