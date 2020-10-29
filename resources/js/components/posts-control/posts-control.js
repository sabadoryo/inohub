import angular from "angular";

angular
    .module('app')
    .component('postsControl', {
        template: require('./posts-control.html'),
        controller: ['$http', '$uibModal', controller],
        bindings: {
            //
        }
    });

function controller($http, $uibModal) {

	let $ctrl = this;

    $ctrl.title = null;
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
        $ctrl.title = null;
        $ctrl.status = null;
        $ctrl.getList();
    };

    $ctrl.getList = () => {
        $ctrl.loading = true;
        $http
            .get('/control-panel/posts/get-list', {
                params: {
                    page: $ctrl.page,
                    title: $ctrl.title,
                    status: $ctrl.status,
                }
            })
            .then(
                response => {
                    $ctrl.loading = false;
                    $ctrl.posts = response.data.data;
                    $ctrl.total = response.data.total;
                },
                error => {
                    $ctrl.loading = false;
                    // todo handle error
                }
            )
    };

    $ctrl.openEdit = (index) => {
        $uibModal
            .open({
                component: 'postCheckModal',
                resolve: {
                    post: function () {
                        return $ctrl.posts[index];
                    }
                }
            })
            .result
            .then(
                res => {

                },
                err => {

                }
            );
    }
}