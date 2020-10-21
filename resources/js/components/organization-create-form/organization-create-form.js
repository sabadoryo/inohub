import angular from "angular";

angular
    .module('app')
    .component('organizationCreateForm', {
        template: require('./organization-create-form.html'),
        controller: ['Upload', controller],
        bindings: {
            countries: '<',
        }
    });
    
function controller(Upload) {
 
	const $ctrl = this;

	$ctrl.name = null;
	$ctrl.country = null;
	$ctrl.city = null;
	$ctrl.logo = null;

	$ctrl.$onInit = function () {
    };

	$ctrl.countryChanged = () => {
        $ctrl.city = null;
    };

    $ctrl.save = () => {
        $ctrl.loading = true;

        Upload.upload({
            url: '/admin/organizations',
            data: {
                name: $ctrl.name,
                country_code: $ctrl.country.code,
                city_code: $ctrl.city.code,
                logo: $ctrl.logo
            }
        }).then(
            function (response) {
                $ctrl.loading = false;

                window.Swal.fire({
                    icon: 'success',
                    title: 'Организация успешно добавлена',
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    window.location = '/admin/organizations';
                });
            },
            function (error) {
                alert(error);
            },
        )
    };

}