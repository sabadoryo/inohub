import angular from "angular";

angular
    .module('app')
    .component('programToPublishModal', {
        template: require('./program-to-publish-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller($http) {
 
	let $ctrl = this;

    $ctrl.notifyUser = true;
	$ctrl.$onInit = function () {
        $ctrl.program = $ctrl.resolve.program;
    };

    $ctrl.save = () => {
        $ctrl.program.status = 'published';
        let url = '/control-panel/programs/' + $ctrl.program.id + '/publish';
        let params = {
            notify_user: $ctrl.notifyUser,
        };
        $http.post(url, params).then(() => {
            $ctrl.close({$value: $ctrl.program});
        });
    };
}