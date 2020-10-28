import angular from "angular";

angular
    .module('app')
    .component('newsToPublishModal', {
        template: require('./news-to-publish-modal.html'),
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
    $ctrl.loading = false;

    $ctrl.$onInit = function () {
        $ctrl.news = $ctrl.resolve.news;
    };

    $ctrl.save = () => {
        $ctrl.loading = true;
        $ctrl.news.status = 'published';
        let url = '/control-panel/news/' + $ctrl.news.id + '/publish';
        let params = {
            notify_user: $ctrl.notifyUser,
        };
        $http.post(url, params).then(() => {
            $ctrl.loading = false;
            $ctrl.close({$value: $ctrl.news});
        });
    };
}