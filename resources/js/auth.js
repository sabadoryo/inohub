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

    $ctrl.openAuthModal = function (options) {
        return $uibModal.open({
            component: 'authModal',
            windowTemplateUrl: 'custom-modal',
            backdropClass: 'auth-backdrop',
            windowClass: 'auth-modal-window',
            size: 'sm',
            resolve: options
        });
    };

    this.can = function (ability) {
        return checkPermission(ability);
    };

    this.hasRole = function (role) {
        return checkRole(role);
    };

    this.canMultiple = function (arr) {
        for (let i = 0; i < arr.length; i++) {
            if (checkPermission(arr[i])) {
                return true;
            }
        }
        return false;
    };

    this.canMultipleAll = function (arr) {
        for (let i = 0; i < arr.length; i++) {
            if (!checkPermission(arr[i])) {
                return false;
            }
        }
        return true;
    };

    function checkPermission(ability) {
        if (Array.isArray(permissions)) {
            for (let i = 0; i < permissions.length; i++) {
                if (permissions[i] == ability) {
                    return true;
                }
            }
        }
        return false;
    }

    function checkRole(role) {
        if (Array.isArray(roles)) {
            for (let i = 0; i < roles.length; i++) {
                if (roles[i] == role) {
                    return true;
                }
            }
        }
        return false;
    }
}
