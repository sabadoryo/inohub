import angular from "angular";

angular
    .module('app')
    .component('programForms', {
        template: require('./program-forms.html'),
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