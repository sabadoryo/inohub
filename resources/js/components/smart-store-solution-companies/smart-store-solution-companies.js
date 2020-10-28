import angular from "angular";

angular
    .module('app')
    .component('smartStoreSolutionCompanies', {
        template: require('./smart-store-solution-companies.html'),
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
        getCompaniesList();
    };

    function getCompaniesList()
    {
        $http
            .get(`/control-panel/sm/solutions/get-companies-list`)
            .then(
                function (response) {
                    $ctrl.companies = response.data.companies;
                },
                function (error) {
                    // Notifier.ern(error);
                }
            )
    }

    $ctrl.removeCompany = function (id, name) {
        if (confirm(`Вы уверены, что хотите удалить компанию ${name}`)) {
            $ctrl.loading = true;

            $http
                .post(`/control-panel/sm/solutions/${id}/remove`)
                .then(
                    function (response) {
                        notify({
                            message: `Компания ${name} успешно удалена`,
                            duration: 2000,
                            position: 'top',
                            classes: 'alert-success'
                        });
                        $ctrl.loading = false;

                        getCompaniesList();
                    },
                    function (error) {
                        notify({
                            message: error.data.message,
                            duration: 2000,
                            position: 'top',
                            classes: 'alert-danger'
                        });

                        $ctrl.loading = false;
                    }
                )
        }
    };
}
