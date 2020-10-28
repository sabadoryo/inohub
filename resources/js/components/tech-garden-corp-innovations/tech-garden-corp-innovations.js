import angular from "angular";

angular
    .module('app')
    .component('techGardenCorpInnovations', {
        template: require('./tech-garden-corp-innovations.html'),
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