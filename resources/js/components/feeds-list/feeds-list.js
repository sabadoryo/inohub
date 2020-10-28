import angular from "angular";

angular
    .module('app')
    .component('feedsList', {
        template: require('./feeds-list.html'),
        controller: ['$http', '$uibModal', 'applicationWindow', 'Auth', controller],
        bindings: {
            feeds: '<',
            feedsCount: '<'
        }
    });

function controller($http, $uibModal, applicationWindow, Auth) {

	let $ctrl = this;

	$ctrl.page = 1;

    $ctrl.loadMore = () => {
        $ctrl.page++;

        $http
            .get('/get-feeds-list', {
                params: {
                    page: $ctrl.page
                }
            })
            .then(
                res => {
                    res.data.forEach(feed => {
                        $ctrl.feeds.push(feed);
                    });
                }
            );
    };

    $ctrl.signUpForEvent = (event) => {
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

                }
            });
        }
    };
}