import angular from "angular";

angular
    .module('app')
    .component('eventPageForm', {
        template: require('./event-page-form.html'),
        controller: ['$uibModal', '$http', controller],
        bindings: {
            event: '<',
        }
    });

function controller($uibModal, $http) {

    let $ctrl = this;

    $ctrl.$onInit = function () {
    };

    $ctrl.openToPublishModal = () => {
        Swal.fire({
            title: 'Вы уверены?',
            text: "Данная мероприятие сразу же появиться в ленте у пользователей",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да',
            cancelButtonText: 'Отмена'
        }).then((result) => {
            if (result.isConfirmed) {
                $http
                    .post(`/control-panel/events/${$ctrl.event.id}/publish`)
                    .then(
                        function () {
                            Swal.fire('Успешно опубликована', '', 'success');
                            $ctrl.event.status = 'published';
                        }
                    );
            }
        })
    };
}