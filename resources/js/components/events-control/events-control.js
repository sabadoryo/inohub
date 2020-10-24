import angular from "angular";

angular
    .module('app')
    .component('eventsControl', {
        template: require('./events-control.html'),
        controller: ['$uibModal','$http',controller],
        bindings: {
            //
        }
    });

function controller($uibModal, $http) {

    let $ctrl = this;
    $ctrl.events = [];
    $ctrl.loading = false;

    $ctrl.$onInit = function () {
        $ctrl.getList();
    };

    $ctrl.getList = function() {
      $ctrl.loading = true;

      $http
          .get('/control-panel/events/get-list')
          .then(result => {
              $ctrl.events = result.data;
              $ctrl.loading = false;
          }, error => {
              $ctrl.loading = false;
              alert('ERROR!!!!:/');
          })


    };

    $ctrl.openCreateEventModal = function () {
        $uibModal
            .open({
                component: 'createEventModal'
            })
            .result
            .then(
                data => {
                    $ctrl.events.push(data);
                },
                error => {
                    console.log('failed');
                }
            );

    }
}
