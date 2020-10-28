import angular from "angular";

angular
    .module('app')
    .component('newsCreateModal', {
        template: require('./news-create-modal.html'),
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
	// $ctrl.description = null;
	$ctrl.loading = false;

	$ctrl.$onInit = function () {
    };

	$ctrl.save = () => {
	    $ctrl.loading = true;
	    $http
            .post('/control-panel/news', {
                title: $ctrl.title,
                // short_description: $ctrl.description,
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    window.location = `/control-panel/news/${res.data.id}/main`;
                },
                err => {
                    $ctrl.loading = false;
                    // todo Alert error
                }
            );
    };
}