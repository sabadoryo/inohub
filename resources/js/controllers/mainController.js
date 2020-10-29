import angular from "angular";

angular
    .module('app')
    .controller('MainController', ['$scope', '$uibModal', 'Auth', '$rootScope', '$http', controller]);

function controller($scope, $uibModal, Auth, $rootScope, $http) {

    $scope.user = Auth.user();

    $scope.test = function () {
        console.log('Hello world');
    }

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
