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
	$ctrl.solution = null;
	$ctrl.image = null;
	$ctrl.presentation = null;
	$ctrl.addedSolutions = [];

	$ctrl.$onInit = function () {

    };

	$ctrl.addSolution = function () {
	    $ctrl.addedSolutions.push(_.cloneDeep($ctrl.solution));
	    $ctrl.solution = null;
    };

	$ctrl.removeSolution = function () {
	    $ctrl.addedSolutions.pop();
    };

	$ctrl.submit = function () {

	    let solutions = '';
	    if (!$ctrl.addedSolutions.length) {
	        notify({
                message: 'Поле "список решении" обязательно для заполнения',
                duration: 2000,
                position: 'top',
                classes: 'alert-danger'
            });

	        return;
        } else {
	        solutions = $ctrl.addedSolutions.join(';');
        }

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
	        solutions: solutions,
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
                    notify({
                        message: 'Добавлено',
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-success'
                    });

                    // window.location.href = '/control-panel/sm/solutions';
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
