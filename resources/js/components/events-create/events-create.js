import angular from "angular";

angular
    .module('app')
    .component('eventsCreate', {
        template: require('./events-create.html'),
        controller: ['$http', 'Upload', 'notify', controller],
        bindings: {
            //
        }
    });

function controller($http, Upload, notify) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        let $ctrl = this;
        $ctrl.name = null;
        $ctrl.shortDescription = null;
        $ctrl.startDate = null;
        $ctrl.startDateTime = null;
        $ctrl.endDate = null;
        $ctrl.endDateTime = null;
        $ctrl.image = null;

        $ctrl.$onInit = function () {
            //
        };

        $ctrl.submit = function () {
            Upload
                .upload({
                    url: '/control-panel/events',
                    data: {
                        name: $ctrl.name,
                        shortDescription: $ctrl.shortDescription,
                        startDate: $ctrl.startDate,
                        startDateTime: $ctrl.startDateTime,
                        endDate: $ctrl.endDate,
                        endDateTime: $ctrl.endDateTime,
                        image: $ctrl.image ? $ctrl.image : null,
                    },
                }).then(result => {
                notify({
                    message: 'Сохранено',
                    duration: 2000,
                    position: 'right',
                    classes: 'alert-success'
                });
            }, error => {
                notify({
                    message: 'Произошла ошибка',
                    duration: 2000,
                    position: 'right',
                    classes: 'alert-error'
                });
            });
        }
    };
}
