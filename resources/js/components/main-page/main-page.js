import angular from "angular";

angular
    .module('app')
    .component('mainPage', {
        template: require('./main-page.html'),
        controller: [controller],
        bindings: {
            news: '<',
            newsCount: '<',
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        console.log($ctrl.news);
        console.log($ctrl.newsCount);
    };
}