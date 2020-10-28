import angular from "angular";

angular
    .module('app')
    .service('applicationWindow', ['$q', '$document', '$window', '$rootScope', '$compile', '$timeout', controller]);

function controller($q, $document, $window, $rootScope, $compile, $timeout) {

    this.windows = [];

    this.open = (options) => {

        let defer = $q.defer();

        let el = window.angular.element('<div class="modal-full"');

        el.append(
            `<perfect-scrollbar class="modal-full__container">
                <application-form resolve="$resolve" close="$close($value)" dismiss="$dismiss($value)">
                </application-form>
            </perfect-scrollbar>`
        );

        let newScope = $rootScope.$new(true);

        newScope.$resolve = options.resolve || {};

        newScope.$close = function ($value) {
            defer.resolve($value);
            destroyWindow(el, newScope);
        };

        newScope.$dismiss = function ($value) {
            defer.reject($value);
            destroyWindow(el, newScope);
        };

        $compile(el)(newScope);

        $document.find('body').append(el);

        return defer.promise;
    };

    function destroyWindow(el, scope) {
        el.remove();
        scope.$destroy();
    }

}