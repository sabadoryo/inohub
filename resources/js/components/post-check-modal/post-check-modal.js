import angular from "angular";

angular
    .module('app')
    .component('postCheckModal', {
        template: require('./post-check-modal.html'),
        controller: ['$http', controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });

function controller($http) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
	    $ctrl.post = $ctrl.resolve.post
        console.log($ctrl.post);
    };

	$ctrl.updateStatus = (status) => {
	    let url = '/control-panel/posts/' + $ctrl.post.id + '/update-status';
	    let params = {
	        status: status,
        }
	    $http.post(url, params).then((res) => {
	        $ctrl.post.status = status;
	        $ctrl.post.published_at = res.data.published_at;
	        $ctrl.close({$value: $ctrl.post});
        })
    }
}