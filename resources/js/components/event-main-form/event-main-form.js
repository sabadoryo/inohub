import angular from "angular";

angular
    .module('app')
    .component('eventMainForm', {
        template: require('./event-main-form.html'),
        controller: ['$http', 'Upload', 'moment', 'notify', '$uibModal', controller],
        bindings: {
            event: '<',
        }
    });

function controller($http, Upload, moment, notify, $uibModal) {

    let $ctrl = this;
    $ctrl.myCroppedImage = null;
    $ctrl.loading = false;

    $ctrl.$onInit = function () {
        $ctrl.name = $ctrl.event.name;
        $ctrl.description = $ctrl.event.short_description ? $ctrl.event.short_description : "";
        $ctrl.startDate = moment($ctrl.event.start_date).toDate();
        $ctrl.startDateTime = moment($ctrl.event.start_date).toDate();
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
    $ctrl.getImageFromBase64 = function () {
        return $ctrl.myCroppedImage ? Upload.dataUrltoBlob($ctrl.myCroppedImage) : null;
    };

    $ctrl.save = () => {
        $ctrl.loading = true;
        let image = $ctrl.getImageFromBase64();
        let url = '/control-panel/events/' + $ctrl.event.id + '/update-main';
        let params = {
            name: $ctrl.name,
            image: image ? image : null,
            short_description: $ctrl.description,
            start_date: $ctrl.startDate ? moment($ctrl.startDate).format('YYYY-MM-DD') : null,
            start_date_time: moment($ctrl.startDateTime).format('HH:mm'),
        };
        Upload.upload({
            url: url,
            data: params,
        }).then(() => {
            $ctrl.loading = false;
            window.Swal.fire({
                icon: 'success',
                title: 'Данные обновлены',
                timer: 2000,
                showConfirmButton: false,
            });
        }, (error) => {
            $ctrl.loading = false;
            let checked = false;
            let message = '';
            angular.forEach(error.data.errors, function (value, key) {
                if (!checked) {
                    message += value[0];
                    checked = true;
                }
            });
            notify({
                message: message ? message : 'Неизвестная ошибка',
                duration: 2000,
                classes: 'alert-danger',
            });
        });
    };
}
