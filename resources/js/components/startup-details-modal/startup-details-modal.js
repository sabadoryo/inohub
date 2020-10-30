import angular from "angular";

angular
    .module('app')
    .component('startupDetailsModal', {
        template: require('./startup-details-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&',
        }
    });

function controller($http) {

    let $ctrl = this;
    $ctrl.loading = false;

    $ctrl.$onInit = function () {
        console.log($ctrl.resolve.startup);
    };

    $ctrl.accept = function () {
        $ctrl.loading = true;

        $http
            .post(`/admin/startups/${$ctrl.resolve.startup.id}/accept`)
            .then(res => {
                $ctrl.loading = false;
                $ctrl.close({$value: 'accepted'});
            }, err => {
                alert(err);
            })
    };

    $ctrl.reject = function () {
        $ctrl.loading = false;

        $http
            .post(`/admin/startups/${$ctrl.resolve.startup.id}/reject`)
            .then(res => {
                $ctrl.loading = false;
                $ctrl.close({$value: 'rejected'});
            }, err => {
                alert(err);
            })
    };
}
