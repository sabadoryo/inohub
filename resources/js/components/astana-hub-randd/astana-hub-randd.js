import angular from "angular";

angular
    .module('app')
    .component('astanaHubRandd', {
        template: require('./astana-hub-randd.html'),
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