import angular from "angular";

angular
    .module('app')
    .component('projectRegisterForm', {
        template: require('./project-register-form.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.step = 1;

	$ctrl.name = null;
	$ctrl.shortDescription =  null;
	$ctrl.stage = null;
	$ctrl.anotherStage = null;
	$ctrl.link = null;

	$ctrl.bin = null;
	$ctrl.legalName = null;
	$ctrl.ceo = null;



	$ctrl.$onInit = function () {
    };

	$ctrl.toStep = step => {
	    $ctrl.step = step;
    };

	$ctrl.submit = function () {
		$http
			.post('/register-project', {
				name: $ctrl.name,
				short_description: $ctrl.shortDescription,
				stage: $ctrl.stage,
				another_stage: $ctrl.anotherStage,
				link: $ctrl.link,
				bin: $ctrl.bin,
				legal_name: $ctrl.legalName,
				ceo: $ctrl.ceo,
			})
			.then(
				function (response) {

				},
				function () {

				}
			);
	};
}