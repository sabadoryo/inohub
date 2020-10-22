import angular from "angular";

angular
    .module('app')
    .controller('MainController', ['$scope', '$uibModal', 'Auth', '$rootScope', controller]);

function controller($scope, $uibModal, Auth, $rootScope) {

    $scope.user = Auth.user();

    $rootScope.$on('UserAuthenticated', (event, data) => {
        $scope.user = data.user;
    });

    $scope.openLoginModal = function () {
        Auth.openLoginModal();
    };

}