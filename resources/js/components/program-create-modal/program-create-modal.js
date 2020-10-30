import angular from "angular";

angular
    .module('app')
    .component('programCreateModal', {
        template: require('./program-create-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.title = null;
    $ctrl.shortDescription = null;

	$ctrl.save = () => {
	    $ctrl.loading = true;
	    $http
            .post(`/control-panel/programs`, {
                title: $ctrl.title,
                short_description: $ctrl.shortDescription,
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    window.location = `/control-panel/programs/${res.data.id}/main`;
                },
                err => {
                    $ctrl.loading = false;
                }
            );
    };
}
