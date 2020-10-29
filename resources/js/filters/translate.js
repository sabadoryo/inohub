import angular from "angular";

angular
    .module('app')
    .filter('translate',['trans', function (trans) {
        return function (key, replace) {
            return trans(key, replace);
        }
    }]);

