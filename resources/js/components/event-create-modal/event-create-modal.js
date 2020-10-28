import angular from "angular";

angular
    .module('app')
    .component('eventCreateModal', {
        template: require('./event-create-modal.html'),
        controller: ['$http', 'moment', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http, moment) {
 
	let $ctrl = this;

	$ctrl.name = null;
    $ctrl.startDate = null;
    $ctrl.startDateTime = null;
	$ctrl.$onInit = function () {
    };

	$ctrl.save = () => {
	    $ctrl.loading = true;

	    $http
            .post('/control-panel/events', {
                name: $ctrl.name,
                start_date: moment($ctrl.startDate).format('YYYY-MM-DD'),
                start_date_time: moment($ctrl.startDateTime).format('HH:mm'),
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    window.location = `/control-panel/events/${res.data.id}/main`;
                },
                err => {
                    $ctrl.loading = false;
                    // todo Alert error
                }
            )
    }
}