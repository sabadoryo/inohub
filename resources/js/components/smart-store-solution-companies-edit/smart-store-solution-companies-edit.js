import angular from "angular";

angular
    .module('app')
    .component('smartStoreSolutionCompaniesEdit', {
        template: require('./smart-store-solution-companies-edit.html'),
        controller: ['Upload', 'notify', controller],
        bindings: {
            company: '<'
        }
    });

function controller (Upload, notify) {

	let $ctrl = this;

    $ctrl.name = null;
    $ctrl.description = null;
    $ctrl.link = null;
    $ctrl.solutions = null;
    $ctrl.image = null;
    $ctrl.presentation = null;
    $ctrl.imageType = 'input';

	$ctrl.$onInit = function () {
        $ctrl.name = $ctrl.company.name;
        $ctrl.description = $ctrl.company.description;
        $ctrl.solutions = $ctrl.company.solutions;
        $ctrl.link = $ctrl.company.site;
        $ctrl.image = $ctrl.company.icon;
        $ctrl.presentation = $ctrl.company.presentation_path;

    };

	$ctrl.changeType = function () {
	    if (!(typeof $ctrl.image === 'string')) {
            $ctrl.imageType = 'changed';
        }
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

        let imagePath = null;
        let presentationPath = null;

        let params = {
            name: $ctrl.name,
            description: $ctrl.description,
            link: $ctrl.link,
            solutions: $ctrl.solutions,
        };

        if (typeof $ctrl.image === 'string') {
            imagePath = _.cloneDeep($ctrl.image);
            params['imagePath'] =  imagePath;
        } else {
            params['image'] =  $ctrl.image;
        }

        if (typeof $ctrl.presentation === 'string') {
            presentationPath = _.cloneDeep($ctrl.presentation);
            params['presentationPath'] =  presentationPath;
        } else {
            params['presentation'] =  $ctrl.presentation;
        }

        Upload
            .upload({
                url: `/control-panel/sm/solutions/${$ctrl.company.id}/update`,
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
