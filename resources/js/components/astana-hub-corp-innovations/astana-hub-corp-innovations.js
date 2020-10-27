import angular from "angular";

angular
    .module('app')
    .component('astanaHubCorpInnovations', {
        template: require('./astana-hub-corp-innovations.html'),
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