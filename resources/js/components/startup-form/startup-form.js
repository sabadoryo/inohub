import angular from "angular";

angular
    .module('app')
    .component('startupForm', {
        template: require('./startup-form.html'),
        controller: ['Upload', controller],
        bindings: {
            dismiss: '&',
            close: '&',
        }
    });

function controller(Upload) {

	let $ctrl = this;

	$ctrl.projectName = null;
	$ctrl.description = null;
    $ctrl.link = null;
    $ctrl.logotype = null;
    $ctrl.companyName = null;
    $ctrl.bin = null;
    $ctrl.employeesCount = null;
    $ctrl.foundationYear = null;

	$ctrl.$onInit = function () {
        //
    };

	$ctrl.submit = () => {
	    $ctrl.loading = true;

	    Upload.upload({
            url: '/startups',
            data: {
                project_name: $ctrl.projectName,
                description: $ctrl.description,
                link: $ctrl.link,
                logotype: $ctrl.logotype,
                company_name: $ctrl.companyName,
                bin: $ctrl.bin,
                employees_count: $ctrl.employeesCount,
                foundation_year: $ctrl.foundationYear,
            }
        }).then(
            res => {
                $ctrl.loading = false;
                Swal.fire(
                    'Отлично! Стартап успешно зарегистрирован',
                    `После модерации Изменения по данной заявке можете смотреть в личном кабинете`,
                    'success'
                ).then(res => {
                    $ctrl.close();
                });
            },
            err => {
                $ctrl.loading = false;
            }
        );
    };
}