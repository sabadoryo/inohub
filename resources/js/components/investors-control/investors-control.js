import angular from "angular";

angular
    .module('app')
    .component('investorsControl', {
        template: require('./investors-control.html'),
        controller: ['$http', 'notify', '$uibModal', controller],
        bindings: {
            //
        }
    });

function controller($http, notify, $uibModal) {

	let $ctrl = this;
	$ctrl.page = 1;
	$ctrl.search = null;
	$ctrl.status = null;

	$ctrl.$onInit = function () {
	    $ctrl.getList();
    };

	$ctrl.getList = function () {
	    $http
            .get(`/admin/investors/get-list`, {
                params: {
                    page: $ctrl.page,
                    status: $ctrl.status,
                    search: $ctrl.search,
                }
            })
            .then(
                function (response) {
                    $ctrl.investors = response.data.data;
                },
                function (error) {

                }
            )
    };

	$ctrl.editInvestor = function (investor) {
	    $uibModal
            .open({
                component: 'investorsEdit',
                resolve: {
                    investor: function () {
                        return investor;
                    }
                },
                size: 'lg'
            })
            .result
            .then(function (status) {
                if (status === 'accepted') {
                    notify({
                        message: 'Инвестор успешно подтверждён',
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-success'
                    });
                } else if (status === 'rejected') {
                    notify({
                        message: 'Инвестор успешно отклонён',
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-success'
                    });
                }
            })
    };

    $ctrl.filter = function () {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = function () {
        $ctrl.search = null;
        $ctrl.status = null;
        $ctrl.page = 1;
        $ctrl.getList();
    };
}
