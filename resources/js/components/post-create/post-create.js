import angular from "angular";

angular
    .module('app')
    .component('postCreate', {
        template: require('./post-create.html'),
        controller: [controller],
        bindings: {
            //
        }
    });

function controller() {

	let $ctrl = this;

	$ctrl.loading = false;
	$ctrl.$onInit = function () {

    };

	$ctrl.save = () => {
        $ctrl.loading = true;
        let url = '/control-panel/events/' + $ctrl.event.id + '/update-main';
        let params = {
            name: $ctrl.name,
            image: $ctrl.image ? $ctrl.image : null,
            short_description: $ctrl.description,
            start_date: $ctrl.startDate ? moment($ctrl.startDate).format('YYYY-MM-DD') : null,
            start_date_time: moment($ctrl.startDateTime).format('HH:mm'),
        };
    }
}