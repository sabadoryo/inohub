import angular from "angular";

angular
    .module('app')
    .component('userDetailsModal', {
        template: require('./user-details-modal.html'),
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
        $ctrl.status = $ctrl.resolve.user.is_active;
        console.log($ctrl.resolve);
    };

    $ctrl.save = function () {
        $ctrl.loading = true;

        if ($ctrl.status === $ctrl.resolve.user.is_active) {
            $ctrl.close({$value: $ctrl.status});
        } else {
            let url = '/admin/users/' + $ctrl.resolve.user.id + '/change-active';
            $http.post(url).then(function (response) {
                $ctrl.close({$value: $ctrl.status});
            }, function (error) {
                alert(error);
                console.log(error);
            });
        }
    };
}
