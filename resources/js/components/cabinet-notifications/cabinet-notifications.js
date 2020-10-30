import angular from "angular";

angular
    .module('app')
    .component('cabinetNotifications', {
        template: require('./cabinet-notifications.html'),
        controller: ['$http', controller],
        bindings: {
            //
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.getNotificationsList();
    };

	$ctrl.getNotificationsList = () => {
	    let url = '/cabinet/notifications/get-list';
	    $http.post(url).then((res) => {
	        $ctrl.notifications = res.data.notifications;
	        $ctrl.total = res.data.notifications.length;
        });
    }
}