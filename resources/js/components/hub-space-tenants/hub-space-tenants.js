import angular from "angular";

angular
    .module('app')
    .component('hubSpaceTenants', {
        template: require('./hub-space-tenants.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            message: '@'
        }
    });

function controller($http, notify) {

    let $ctrl = this;

    $ctrl.$onInit = function () {
        if ($ctrl.message) {
            notify({
                message: $ctrl.message,
                duration: 2000,
                position: 'top',
                classes: 'alert-success'
            });
        }
        getTenantsList();
    };

    function getTenantsList() {
        $http
            .get('/control-panel/hub-space-tenants/get-list')
            .then(
                function (response) {
                    $ctrl.tenants = response.data.tenants;
                },
                function (error) {
                }
            )
    }
}
