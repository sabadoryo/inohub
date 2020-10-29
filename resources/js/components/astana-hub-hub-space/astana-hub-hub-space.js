import angular from "angular";

angular
    .module('app')
    .component('astanaHubHubSpace', {
        template: require('./astana-hub-hub-space.html'),
        controller: ['Auth', 'applicationWindow', controller],
        bindings: {
            //
        }
    });

function controller(Auth, applicationWindow) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        //
    };

	$ctrl.bookSeats = function () {
        if (!Auth.user()) {
            Auth
                .openAuthModal({to: () => 'applicationWindow'})
                .result
                .then(
                    res => {
                        openAppWindow();
                    }
                );
        } else {
            openAppWindow();
        }

        function openAppWindow() {
            applicationWindow.open({
                resolve: {
                    entityType: 'hub-space-tenants',
                    entityId: Auth.user().id,
                }
            });
        }
    };
}
