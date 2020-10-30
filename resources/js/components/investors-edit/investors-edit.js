import angular from "angular";

angular
    .module('app')
    .component('investorsEdit', {
        template: require('./investors-edit.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http, notify) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        $ctrl.investor = $ctrl.resolve.investor;
    };

    $ctrl.accept = function () {
        $http
            .post(`/admin/investors/${$ctrl.investor.id}/accept`)
            .then(
                function (response) {
                    $ctrl.investor.status = 'accepted';
                    $ctrl.close({$value: 'accepted'})
                },
                function (error) {
                    notify({
                        message: error.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    });
                }
            )
    };

    $ctrl.reject = function () {
        $http
            .post(`/admin/investors/${$ctrl.investor.id}/reject`)
            .then(
                function (response) {
                    $ctrl.investor.status = 'rejected';
                    $ctrl.close({$value: 'rejected'});
                },
                function (error) {
                    notify({
                        message: error.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    });
                }
            )
    };

}
