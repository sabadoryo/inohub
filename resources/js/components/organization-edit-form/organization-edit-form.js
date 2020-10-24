import angular from "angular";

angular
    .module('app')
    .component('organizationEditForm', {
        template: require('./organization-edit-form.html'),
        controller: ['$http', controller],
        bindings: {
            organization: '<'
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.name = $ctrl.organization.name;
    };

	$ctrl.submit = function () {
        $ctrl.loading = true;

        $http
            .post(`/control-panel/organizations/${$ctrl.organization.id}`, {
                _method: 'PUT',
                name: $ctrl.name
            })
            .then(
                function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Данные успешно сохранены',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $ctrl.loading = false;
                },
                function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Что-то пошло не так',
                        text: 'Текст ошибки',
                    });
                    $ctrl.loading = false;
                }
            );
    };
}