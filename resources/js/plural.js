angular
    .module('app')
    .filter('plural', [function () {
        return function (count, words) {
            let cases = [2, 0, 1, 1, 1, 2];
            if (!angular.isNumber(count)) {
                count = 0;
            }
            return words[(count % 100 > 4 && count % 100 < 20) ? 2 : cases[Math.min(count % 10, 5)]];
        };
    }]);
