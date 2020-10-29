import angular from "angular";

angular
    .module('app')
    .component('vacancyCreateModal', {
        template: require('./vacancy-create-modal.html'),
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
    $ctrl.loading = false;

	$ctrl.$onInit = function () {
    };

    $ctrl.save = () => {
        $ctrl.loading = true;
        $http
            .post('/control-panel/vacancies', {
                title: $ctrl.title,
            })
            .then(
                res => {
                    $ctrl.loading = false;
                    window.location = `/control-panel/vacancies/${res.data.id}/main`;
                },
                err => {
                    $ctrl.loading = false;
                    // todo Alert error
                }
            );
    }
}