import angular from "angular";

angular
    .module('app')
    .component('eventsControl', {
        template: require('./events-control.html'),
        controller: ['$uibModal','$http',controller],
        bindings: {
        }
    });

function controller($uibModal, $http) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.name = null;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.filter = () => {
        $ctrl.page = 1;
        $ctrl.getList();
    };

    $ctrl.reset = () => {
        $ctrl.page = 1;
        $ctrl.name = null;
        $ctrl.getList();
    };

    $ctrl.getList = function() {
      $ctrl.loading = true;

      $http
          .get('/control-panel/events/get-list', {
              params: {
                  page: $ctrl.page,
                  name: $ctrl.name,
              }
          })
          .then(
              response => {
                  $ctrl.events = response.data.data;
                  $ctrl.total = response.data.total;
              },
              error => {
                  // todo handle error
              }
          )


    };

    $ctrl.openCreateModal = () => {
        $uibModal
            .open({
                component: 'eventCreateModal',
            })
            .result
            .then(
                res => {

                },
                err => {

                }
            );
    };
}
