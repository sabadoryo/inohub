import angular from "angular";

angular
    .module('app')
    .service('Auth', ['AUTH_USER', 'AUTH_PERMISSIONS', 'AUTH_ROLES', '$uibModal', '$q', '$rootScope', controller]);

function controller(user, permissions, roles, $uibModal, $q, $rootScope) {

    let $ctrl = this;

    $rootScope.$on('UserAuthenticated', (event, data) => {
        $ctrl.user = data.user;
        $ctrl.roles = data.roles;
        $ctrl.permissions = data.permissions;
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

    $ctrl.openAuthModal = function () {
        $uibModal.open({component: 'authModal'});
    };
}
