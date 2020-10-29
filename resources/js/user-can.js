import angular from "angular";

angular
    .module('app')
    .directive('userCan', ['Auth', 'ngIfDirective', function (Auth, ngIfDirective) {
        let ngIf = ngIfDirective[0];
        return {
            transclude: ngIf.transclude,
            priority: ngIf.priority - 1,
            terminal: ngIf.terminal,
            restrict: ngIf.restrict,
            link: function(scope, element, attributes) {

                let initialNgIf = attributes.ngIf;
                let ifEvaluator;
                let permission = attributes.userCan;
                let isReverse = !!attributes.userCanReverse;
                let userCanAll = !!attributes.userCanAll;

                let res;

                if (permission.indexOf(',') !== -1) {
                    let arr = permission.split(',');
                    if (userCanAll) {
                        res = Auth.canMultipleAll(arr);
                    } else {
                        res = Auth.canMultiple(arr);
                    }
                } else {
                    res = Auth.can(permission);
                }


                if (isReverse) {
                    res = !res;
                }

                if (initialNgIf) {
                    ifEvaluator = function () {
                        return scope.$eval(initialNgIf) && res;
                    }
                } else {
                    ifEvaluator = function () {
                        return res;
                    }
                }

                attributes.ngIf = ifEvaluator;
                ngIf.link.apply(ngIf, arguments);
            }
        };
    }]);
