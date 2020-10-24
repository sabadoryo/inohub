import angular from "angular";

angular
    .module('app')
    .service('Auth', ['AUTH_USER', 'AUTH_PERMISSIONS', 'AUTH_ROLES', '$uibModal', '$q', '$rootScope', controller]);

function controller(user, permissions, roles, $uibModal, $q, $rootScope) {

    let $ctrl = this;

    $rootScope.$on('UserRegistered', (event, data) => {
        $ctrl.user = user;
        $ctrl.roles = [];
        $ctrl.permissions = [];
    });

    $rootScope.$on('UserLogout', () => {
        $ctrl.user = null;
        $ctrl.roles = null;
        $ctrl.permissions = null;
    });

    $ctrl.user = () => { return user };

    $ctrl.roles = () => { return roles };

    $ctrl.permissions = () => { return permissions };

    $ctrl.hasRole = (role) => { return roles.indexOf(role) !== -1 };

    $ctrl.openLoginModal = function () {
        let d = $q.defer();

        $uibModal
            .open({
                component: 'loginModal'
            })
            .result
            .then(
                data => {
                    $rootScope.$emit('UserAuthenticated', data);
                    $ctrl.user = data.user;
                    $ctrl.roles = data.roles;
                    $ctrl.permissions = data.permissions;
                    d.resolve(user);
                },
                error => {
                    d.reject();
                }
            );

        return d.promise;
    };

    $ctrl.openRegisterModal = () => {
        let d = $q.defer();

        $uibModal
            .open({
                component: 'registerModal'
            })
            .result
            .then(
                data => {
                    $ctrl.user = data.user;
                    $ctrl.roles = data.roles;
                    $ctrl.permissions = data.permissions;
                    d.resolve(user);
                },
                error => {
                    d.reject();
                }
            );

        return d.promise;
    };
}
