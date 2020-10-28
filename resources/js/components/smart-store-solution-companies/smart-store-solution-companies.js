import angular from "angular";

angular
    .module('app')
    .component('smartStoreSolutionCompanies', {
        template: require('./smart-store-solution-companies.html'),
        controller: ['$http', 'moment', controller],
        bindings: {
            //
        }
    });

function controller($http, moment) {

    let $ctrl = this;

    $ctrl.$onInit = function () {
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
}
