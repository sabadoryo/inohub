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
	
	$ctrl.$onInit = function () {
        $ctrl.name = $ctrl.event.name;
        $ctrl.description = $ctrl.event.short_description ? $ctrl.event.short_description : "";
        $ctrl.startDate = moment($ctrl.event.start_date).toDate();
        $ctrl.startDateTime = moment($ctrl.event.start_date).toDate();
    };

	$ctrl.openToPublishModal = () => {
        $uibModal
            .open({
                component: 'eventToPublishModal',
                resolve: {
                    event: function () {
                        return $ctrl.event;
                    }
                }
            })
            .result
            .then(
                res => {
                    window.Swal.fire({
                        icon: 'success',
                        title: 'Опубликовано',
                        timer: 2000,
                        showConfirmButton: false,
                    });
                },
                err => {

                }
            );
    };

	$ctrl.save = () => {
        let url = '/control-panel/events/' + $ctrl.event.id + '/update-main';
        let params = {
            name: $ctrl.name,
            image: $ctrl.image ? $ctrl.image : null,
            short_description: $ctrl.description,
            start_date: $ctrl.startDate ? moment($ctrl.startDate).format('YYYY-MM-DD') : null,
            start_date_time: moment($ctrl.startDateTime).format('HH:mm'),
        };
        Upload.upload({
            url: url,
            data: params,
        }).then(() => {
            window.Swal.fire({
                icon: 'success',
                title: 'Данные обновлены',
                timer: 2000,
                showConfirmButton: false,
            });
	    }, (error) => {
            let checked = false;
            let message = '';
            angular.forEach(error.data.errors, function (value, key){
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