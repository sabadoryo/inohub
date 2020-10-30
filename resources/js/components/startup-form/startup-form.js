import angular from "angular";

angular
    .module('app')
    .component('startupForm', {
        template: require('./startup-form.html'),
        controller: [controller],
        bindings: {
            dismiss: '&',
            close: '&',
        }
    });

function controller() {

	let $ctrl = this;

	$ctrl.projectName = null;
	$ctrl.description = null;
    $ctrl.link = null;
    $ctrl.logotype = null;

	$ctrl.$onInit = function () {
        //
    };

	$ctrl.test = () => {
	    console.log($ctrl.logotype);
    };
}