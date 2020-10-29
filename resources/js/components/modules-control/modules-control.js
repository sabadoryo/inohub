import angular from "angular";

angular
    .module('app')
    .component('modulesControl', {
        template: require('./modules-control.html'),
        controller: ['$timeout', '$http', 'notify', controller],
        bindings: {
            organizations: '<',
            modules: '<',
        }
    });

function controller($timeout, $http, notify) {

	let $ctrl = this;

    $ctrl.$onInit = function () {
        $ctrl.selectedOrg = $ctrl.organizations[0];
        refreshModulesStatuses();
    };

    function refreshModulesStatuses() {
        $timeout(function () {
            $ctrl.modules.forEach(m => {
                let existsInd = $ctrl.selectedOrg.modules.findIndex(v => v.id === m.id);
                m.isSelected = existsInd !== -1;
            });
        })
    }

    $ctrl.selectOrg = function (org) {
        $ctrl.selectedOrg = org;
        refreshModulesStatuses();
    };

    $ctrl.moduleChanged = function (module) {
        if (module.isSelected) {
            $http
                .post('/admin/modules/attach-module-to-org', {
                    organization_id: $ctrl.selectedOrg.id,
                    module_id: module.id,
                })
                .then(
                    function () {
                        $ctrl.selectedOrg.modules.push(module);
                        notify({
                            message: 'Сохранено',
                            duration: 2000,
                            position: 'right',
                            classes: 'alert-success'
                        });
                    },
                    function (error) {
                        alert(error.message);
                    }
                )
        } else {
            $http
                .post('/admin/modules/detach-module-from-org', {
                    organization_id: $ctrl.selectedOrg.id,
                    module_id: module.id,
                })
                .then(
                    function () {
                        let ind = $ctrl.selectedOrg.modules.findIndex(v => v.id == module.id);
                        $ctrl.selectedOrg.modules.splice(ind, 1);
                        notify({
                            message: 'Сохранено',
                            duration: 2000,
                            position: 'right',
                            classes: 'alert-success'
                        });
                    },
                    function (error) {
                        alert(error.message);
                    }
                )
        }
    };
}