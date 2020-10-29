import angular from "angular";

angular
    .module('app')
    .component('smartStoreSolutionCompaniesCreate', {
        template: require('./smart-store-solution-companies-create.html'),
        controller: ['Upload', 'notify', controller],
        bindings: {
            app: '<'
        }
    });

function controller(Upload, notify) {

	let $ctrl = this;

	$ctrl.name = null;
	$ctrl.description = null;
	$ctrl.link = null;
	$ctrl.solutions = null;
	$ctrl.image = null;
	$ctrl.imageType = null;
	$ctrl.presentation = null;
	$ctrl.presentationType = null;

	$ctrl.$onInit = function () {
        if ($ctrl.app) {
            setAppData();
        }
    };

	function setAppData() {
        let fields = [];

        $ctrl.app.forms.forEach(form => {
            form.fields.forEach(field => {
                fields.push({
                    label: field.form_field.label,
                    value: field.value
                });
            });
        });

        let companyName = fields.find(v => v.label === 'Название компании');

        if (companyName) {
            $ctrl.name = companyName.value;
        }

        let image = fields.find(v => v.label === 'Логотип');

        if (image) {
            $ctrl.image = image.value[0];
            $ctrl.imageType = 'string';
        }

        let description = fields.find(v => v.label === 'Описание компании');

        if (description) {
            $ctrl.description = description.value;
        }

        let link = fields.find(v => v.label === 'Сайт компании');

        if (link) {
            $ctrl.link = link.value;
        }

        let solutions = fields.find(v => v.label === 'Решения');

        if (solutions) {
            $ctrl.solutions = solutions.value;
        }

        let presentation = fields.find(v => v.label === 'Презентация компании');

        if (presentation) {
            $ctrl.presentation = presentation.value[0];
            $ctrl.presentationType = 'string';
        }
    }

    $ctrl.imageChanged = function () {
	    $ctrl.imageType = 'file';
    };

	$ctrl.presentationChanged = function () {
	    $ctrl.presentationType = 'file';
    };

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

        if (!$ctrl.presentation) {
            notify({
                message: 'Добавьте презентацию',
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
        };

        if ($ctrl.imageType === 'string') {
            params['imagePath'] = $ctrl.image;
        } else {
            params['image'] = $ctrl.image;
        }

        if ($ctrl.presentationType === 'string') {
            params['presentationPath'] = $ctrl.presentation;
        } else {
            params['presentation'] = $ctrl.presentation;
        }

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
