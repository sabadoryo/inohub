import angular from "angular";

angular
    .module('app')
    .component('mainPage', {
        template: require('./main-page.html'),
        controller: [controller],
        bindings: {
            news: '<',
            newsCount: '<',
            feedsCount: '<',
            feeds: '<',
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {

    };
}