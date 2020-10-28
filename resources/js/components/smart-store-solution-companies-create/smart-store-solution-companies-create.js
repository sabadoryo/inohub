import angular from "angular";

angular
    .module('app')
    .component('smartStoreSolutionCompaniesCreate', {
        template: require('./smart-store-solution-companies-create.html'),
        controller: ['Upload', 'notify', controller],
        bindings: {
            //
        }
    });

function controller(Upload, notify) {

	let $ctrl = this;

	$ctrl.name = null;
	$ctrl.description = null;
	$ctrl.link = null;
	$ctrl.solutions = null;
	$ctrl.image = null;
	$ctrl.presentation = null;

	$ctrl.$onInit = function () {};

	$ctrl.submit = function () {

	    if (!$ctrl.image) {
            notify({
                message: 'Добавьте изображение',
                duration: 2000,
                position: 'top',
                classes: 'alert-danger'
            });

            return;
        }

	    let params = {
	        name: $ctrl.name,
	        description: $ctrl.description,
	        link: $ctrl.link,
	        solutions: $ctrl.solutions,
	        image: $ctrl.image,
	        presentation: $ctrl.presentation,
        };


	    Upload
            .upload({
                url: '/control-panel/sm/solutions',
                data: params
            })
            .then(
                res => {
                    window.location.href = `/control-panel/sm/solutions?success_message=${res.data.message}`;
                },
                err => {
                    notify({
                        message: err.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    })
                }
            );
    };
}
