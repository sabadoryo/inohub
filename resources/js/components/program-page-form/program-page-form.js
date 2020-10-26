import angular from "angular";

angular
    .module('app')
    .component('programPageForm', {
        template: require('./program-page-form.html'),
        controller: [controller],
        bindings: {
            program: '<',
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        console.log($ctrl.program);
    };
}