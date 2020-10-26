import angular from "angular";

angular
    .module('app')
    .component('createEventModal', {
        template: require('./create-event-modal.html'),
        controller: ['$http', 'Upload', 'notify', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http, Upload, notify) {

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
                url: '/control-panel/events/create',
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
            $ctrl.close({$value: result.data});
        }, error => {
            notify({
                message: 'Произошла ошибка',
                duration: 2000,
                position: 'right',
                classes: 'alert-error'
            });
        });
    }
}
