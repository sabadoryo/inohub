import angular from "angular";

angular
    .module('app')
    .component('organizationForm', {
        template: require('./organization-form.html'),
        controller: [controller],
        bindings: {
            organization: '<',
        }
    });
    
function controller() {
 
	let $ctrl = this;

	$ctrl.type = 'main';

	$ctrl.$onInit = function () {
        console.log($ctrl.organization);
    };

	$ctrl.selectType = function (type) {
	    $ctrl.type = type;
	}
}