import angular from "angular";

angular
    .module('app')
    .component('programMainForm', {
        template: require('./program-main-form.html'),
        controller: ['notify', 'moment', '$http', '$uibModal', controller],
        bindings: {
            categories: '<',
            program: '<',
        }
    });
    
function controller(notify, moment, $http, $uibModal) {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.title = $ctrl.program.title;
	    $ctrl.shortDescription = $ctrl.program.short_description;
        $ctrl.limitDate = moment($ctrl.program.limit_date).toDate();
    };

    $ctrl.openToPublishModal = () => {
        Swal.fire({
            icon: 'warning',
            title: 'Вы дейстивтельно хотиту опубликовать программу?',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Да',
            cancelButtonText: 'Отмена'
        }).then(
            res => {
                if (res.isConfirmed) {
                    $http
                        .post('/control-panel/programs/' + $ctrl.program.id + '/publish')
                        .then(() => {
                            $ctrl.program.status = 'published';
                            Swal.fire(
                                'Отлично!',
                                'Программа успешно опубликована',
                                'success'
                            );
                        });
                }
            }
        )
    };

	$ctrl.save = () => {
	    $ctrl.loading = true;

	    $http
            .post(`/control-panel/programs/${$ctrl.program.id}/update-main`, {
                title: $ctrl.title,
                short_description: $ctrl.shortDescription,
                limit_date: $ctrl.limitDate ? moment($ctrl.limitDate).format('YYYY-MM-DD') : null
            })
            .then(
                () => {
                    $ctrl.loading = false;
                    window.Swal.fire({
                        icon: 'success',
                        title: 'Данные обновлены',
                        timer: 1500,
                        showConfirmButton: false,
                    });
                },
                (error) => {
                    $ctrl.loading = false;
                    notify({
                        message: error.data.errors['title'] ? error.data.errors['title'][0] : 'Неизвестная ошибка!',
                        duration: 2000,
                        classes: 'alert-danger',
                    });
                }
            );
    };
}