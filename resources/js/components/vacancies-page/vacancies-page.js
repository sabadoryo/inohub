import angular from "angular";

angular
    .module('app')
    .component('vacanciesPage', {
        template: require('./vacancies-page.html'),
        controller: [controller],
        bindings: {
            'vacancies': '<'
        }
    });

function controller() {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        console.log($ctrl.vacancies)
    };
}
