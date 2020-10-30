import angular from "angular";

angular
    .module('app')
    .component('eventsList', {
        template: require('./events-list.html'),
        controller: [controller],
        bindings: {
            'eventsWeek': '<',
            'eventsMonth': '<',
            'eventsOverMonth': '<',
        }
    });

function controller() {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        console.log('asdasdasd', $ctrl.eventsWeek, $ctrl.eventsMonth)
    };
}
