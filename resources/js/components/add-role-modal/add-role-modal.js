import angular from "angular";

angular
    .module('app')
    .component('addRoleModal', {
        template: require('./add-role-modal.html'),
        controller: ['$http', 'notify', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http, notify) {
 
	let $ctrl = this;

	$ctrl.label = null;

	$ctrl.$onInit = function () {

    };

	$ctrl.save = function () {
	    if (!$ctrl.label) {
            notify({
                message: 'Введите название',
                duration: 2000,
                classes: 'alert-danger',
            });
            return;
        }
	    let url = '/control-panel/acl/add-role';
	    let params = {
	        label: $ctrl.label,
        }
	    $http.post(url, params).then(function (response){
            notify({
                message: 'Сохранено',
                duration: 2000,
                position: 'right',
                classes: 'alert-success'
            });
            $ctrl.close({$value: response.data.role});
        }, function (error) {
	        if (error.data.errors.name.length) {
                notify({
                    message: error.data.errors.name[0],
                    duration: 2000,
                    classes: 'alert-danger',
                });
            } else {
                notify({
                    message: 'Не известная ошибка',
                    duration: 2000,
                    classes: 'alert-danger',
                });
            }
        });
    }
}