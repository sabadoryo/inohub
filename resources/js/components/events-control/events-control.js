import angular from "angular";

angular
    .module('app')
    .component('eventsControl', {
        template: require('./events-control.html'),
        controller: ['$uibModal', '$http', controller],
        bindings: {
        }
    });

function controller($uibModal, $http) {

    let $ctrl = this;

    $ctrl.page = 1;
    $ctrl.name = null;
    $ctrl.status = null;
    $ctrl.total = 0;
    $ctrl.loading = false;

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
        $ctrl.status = null;
        $ctrl.getList();
    };

    $ctrl.getList = function() {
      $ctrl.loading = true;
      $http
          .get('/control-panel/events/get-list', {
              params: {
                  page: $ctrl.page,
                  name: $ctrl.name,
                  status: $ctrl.status,
              }
          })
          .then(
              response => {
                  $ctrl.loading = false;
                  $ctrl.events = response.data.data;
                  $ctrl.total = response.data.total;
                  console.log(response);
              },
              error => {
                  $ctrl.loading = false;
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
