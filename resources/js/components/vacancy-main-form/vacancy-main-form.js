import angular from "angular";

angular
    .module('app')
    .component('vacancyMainForm', {
        template: require('./vacancy-main-form.html'),
        controller: ['$http', controller],
        bindings: {
            vacancy: '<',
            organizations: '<'
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
	    console.log($ctrl.vacancy)
	    console.log($ctrl.organizations)

	    $ctrl.title = $ctrl.vacancy.title;
	    $ctrl.content = $ctrl.vacancy.content;
	    $ctrl.fromSalary = $ctrl.vacancy.from_salary;
        $ctrl.toSalary = $ctrl.vacancy.to_salary;
        $ctrl.location = $ctrl.vacancy.location;
        $ctrl.organization_id = $ctrl.vacancy.organization.id;
    };

    $ctrl.openToPublishModal = () => {
        Swal.fire({
            title: 'Вы уверены?',
            text: "Данная вакансия сразу же появиться в ленте у пользователей",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Да',
            cancelButtonText: 'Отмена'
        }).then((result) => {
            if (result.isConfirmed) {
                $http
                    .post(`/control-panel/vacancies/${$ctrl.vacancy.id}/publish`)
                    .then(
                        function () {
                            Swal.fire('Успешно опубликована', '', 'success');
                            $ctrl.vacancy.status = 'published';
                        }
                    );
            }
        })
    };

    $ctrl.save = () => {
        $ctrl.loading = true;
        let url = '/control-panel/vacancies/' + $ctrl.vacancy.id + '/update-main';
        let params = {
            title: $ctrl.title,
            content_t: $ctrl.content,
            to_salary: $ctrl.toSalary,
            from_salary: $ctrl.fromSalary,
            location: $ctrl.location,
            organization_id: $ctrl.organization_id
        };

        $http.post(url, params).then((res) => {
            $ctrl.loading = false;
            window.Swal.fire({
                icon: 'success',
                title: 'Сохранено',
                timer: 2000,
                showConfirmButton: false,
            });
        }, (error) => {
            $ctrl.loading = false;
            let checked = false;
            let message = '';
            angular.forEach(error.data.errors, (value, key) => {
                if (!checked && value[0]) {
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
