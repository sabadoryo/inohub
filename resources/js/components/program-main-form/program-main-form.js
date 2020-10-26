import angular from "angular";

angular
    .module('app')
    .component('programMainForm', {
        template: require('./program-main-form.html'),
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