import angular from "angular";

angular
    .module('app')
    .controller('MainController', ['$scope', '$uibModal', 'Auth', '$rootScope', '$http', 'applicationWindow', controller]);

function controller($scope, $uibModal, Auth, $rootScope, $http, applicationWindow) {

    $scope.user = Auth.user();

    $scope.test = function () {
        console.log('Hello world');
    };

    $scope.openApplicationModal = () => {
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
                    entityType: $scope.entityType,
                    entityId: $scope.entityId,
                }
            });
        }
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
