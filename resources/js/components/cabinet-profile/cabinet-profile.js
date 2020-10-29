import angular from "angular";

angular
    .module('app')
    .component('cabinetProfile', {
        template: require('./cabinet-profile.html'),
        controller: ['$http', 'Auth', controller],
        bindings: {
        }
    });
    
function controller($http, Auth) {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
    };

}