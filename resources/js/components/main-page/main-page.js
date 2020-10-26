import angular from "angular";

angular
    .module('app')
    .component('mainPage', {
        template: require('./main-page.html'),
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