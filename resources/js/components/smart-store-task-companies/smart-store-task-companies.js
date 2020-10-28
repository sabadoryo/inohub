import angular from "angular";

angular
    .module('app')
    .component('smartStoreTaskCompanies', {
        template: require('./smart-store-task-companies.html'),
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