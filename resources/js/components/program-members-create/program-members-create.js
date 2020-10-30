import angular from "angular";

angular
    .module('app')
    .component('programMembersCreate', {
        template: require('./program-members-create.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            program: '<',
            app: '<'
        }
    });

function controller($http, notify) {

	let $ctrl = this;
	$ctrl.userId = null;

	$ctrl.$onInit = function () {
        getUsersList();
    };

	function getUsersList () {
	    $http
            .get(`/control-panel/programs/${$ctrl.program.id}/members/get-users-list`)
            .then(
                function (response) {
                    $ctrl.users = response.data.users;

                    if ($ctrl.app) {
                        $ctrl.applicationId = $ctrl.app.id;
                        $ctrl.userId = $ctrl.app.entity_id;
                        let user = $ctrl.users.find(v => v.id === $ctrl.userId);

                        if (user) {
                            $ctrl.users = [user];
                        }
                    }
                },
                function (error) {

                }
            )
    }

	$ctrl.submit = function () {
	    $ctrl.loading = true;
	    $http
            .post(`/control-panel/programs/${$ctrl.program.id}/members`, {
                userId: $ctrl.userId,
                applicationId: $ctrl.applicationId || undefined
            })
            .then(
                function (response) {
                    $ctrl.loading = false;
                    window.location.href = `/control-panel/programs/${$ctrl.program.id}/members?success_message=Участник успешно добавлен`;
                },
                function (error) {
                    notify({
                        message: error.data.message,
                        duration: 2000,
                        position: 'top',
                        classes: 'alert-danger'
                    });
                }

            )
    };
}
