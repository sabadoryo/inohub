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
    $ctrl.category = null;

	$ctrl.$onInit = function () {
	    $ctrl.categories = $ctrl.resolve.categories;
    };

	$ctrl.save = () => {
	    $ctrl.loading = true;

	    $http
            .post(`/control-panel/programs`, {
                title: $ctrl.title,
                category_id: $ctrl.category ? $ctrl.category.id : null
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    window.location = `/control-panel/programs/${res.data.id}/main`;
                },
                err => {
                    $ctrl.loading = false;
                    // todo Alert error
                }
            );
    };
}