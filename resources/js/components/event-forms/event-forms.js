import angular from "angular";

angular
    .module('app')
    .component('eventForms', {
        template: require('./event-forms.html'),
        controller: ['notify', '$http', '$uibModal', controller],
        bindings: {
            event: '<',
        }
    });
    
function controller(notify, $http, $uibModal) {
 
	let $ctrl = this;

    $ctrl.loadingSave = false;
	
	$ctrl.$onInit = function () {
        $ctrl.eventForms = $ctrl.event.forms;
        $ctrl.updateFormsList();
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

    $ctrl.addForm = () => {
        if (!$ctrl.form) {
            notify({
                message: 'Выберите форму',
                duration: 2000,
                classes: 'alert-danger',
            });
            return ;
        }
        let ind = $ctrl.eventForms.findIndex(v => v.id === $ctrl.form.id);
        if (ind !== -1) {
            notify({
                message: 'Данная форма уже добавлена',
                duration: 2000,
                classes: 'alert-danger',
            });
            $ctrl.form = null;
            return ;
        }
        $ctrl.eventForms.push($ctrl.form);
        $ctrl.form = null;
    }

    $ctrl.deleteForm = (index) => {
        notify({
            message: 'Форма удалена',
            duration: 2000,
            classes: 'alert-success',
        });
        $ctrl.eventForms.splice(index, 1);
    }

    $ctrl.formDown = (index) => {
        if ($ctrl.eventForms[index + 1]) {
            let x = $ctrl.eventForms[index];
            $ctrl.eventForms[index] = $ctrl.eventForms[index + 1];
            $ctrl.eventForms[index + 1] = x;
        }
    }

    $ctrl.formUp = (index) => {
        if ($ctrl.eventForms[index - 1]) {
            let x = $ctrl.eventForms[index];
            $ctrl.eventForms[index] = $ctrl.eventForms[index - 1];
            $ctrl.eventForms[index - 1] = x;
        }
    }

    $ctrl.openFormCreate = () => {
        window.open('/control-panel/forms/create');
    }

    $ctrl.updateFormsList = () => {
        let url = '/control-panel/events/'+ $ctrl.event.id +'/update-forms-list'
        $http.post(url).then((res) => {
            $ctrl.forms = res.data['forms'];
        });
    }

    $ctrl.save = () => {
        $ctrl.loadingSave = true;
        let url = '/control-panel/events/' + $ctrl.event.id + '/update-forms';
        let params = {
            forms: $ctrl.eventForms,
        }
        $http.post(url, params).then(() => {
            $ctrl.loadingSave = false;
            window.Swal.fire({
                icon: 'success',
                title: 'Данные обновлены',
                timer: 2000,
                showConfirmButton: false,
            });
        }, (error) => {
            $ctrl.loadingSave = false;
            notify({
                message: 'Ошибка!',
                duration: 2000,
                classes: 'alert-danger',
            });
        });
    }
}