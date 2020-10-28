import angular from "angular";

angular
    .module('app')
    .component('eventToPublishModal', {
        template: require('./event-to-publish-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.notifyUser = true;
    $ctrl.loading = false;

	$ctrl.$onInit = function () {
	    $ctrl.event = $ctrl.resolve.event;
    };

	$ctrl.save = () => {
        $ctrl.loading = true;
	    $ctrl.event.status = 'published';
	    let url = '/control-panel/events/' + $ctrl.event.id + '/publish';
	    let params = {
	        notify_user: $ctrl.notifyUser,
        };
	    $http.post(url, params).then(() => {
            $ctrl.loading = false;
            $ctrl.close({$value: $ctrl.event});
        });
    };
}