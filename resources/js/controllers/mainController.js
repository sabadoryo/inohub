import angular from "angular";

angular
    .module('app')
    .controller('MainController', ['$scope', '$uibModal', 'Auth', '$rootScope', '$http', 'applicationWindow', controller]);

function controller($scope, $uibModal, Auth, $rootScope, $http, applicationWindow) {

    $scope.user = Auth.user();

    $scope.test = function () {
        console.log('Hello world');
    }

    $scope.openApplicationModal = () => {
        console.log('clcococo')
        if (!Auth.user()) {
            console.log('clcococo 1')

            Auth
                .openAuthModal({to: () => 'applicationWindow'})
                .result
                .then(
                    res => {
                        openAppWindow();
                    }
                );
        } else {
            console.log('clcococo 2')
            openAppWindow();
        }

        function openAppWindow() {
            applicationWindow.open({
                resolve: {
                    entityType: 'astanahub_membership',
                    entityId: null,
                }
            });
        }

        // $uibModal
        //     .open({
        //         component: 'applicationModal',
        //         resolve: {
        //             entityType: () => 'astanahub_membership',
        //             entityId: () => null,
        //         }
        //     })
        //     .result
        //     .then(
        //         res => {
        //
        //         },
        //         err => {
        //
        //         }
        //     );
    };
    $rootScope.$on('UserAuthenticated', (event, data) => {
        $scope.user = data.user;
    });

    $scope.openLoginModal = function () {
        Auth.openLoginModal();
    };

    $scope.openRegisterModal = function () {
        Auth.openRegisterModal();
    };

    $scope.logout = function () {
        $http
            .post('/logout')
            .then(
                function (response) {
                    $rootScope.$emit('UserLogout');
                    $scope.user = null
                },
                function (error) {

                }
            );
    };
}
