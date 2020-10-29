import angular from "angular";

angular
    .module('app')
    .factory('trans', ['Dictionary', function (Dictionary) {
        return function (key, replace) {

            let translation = Dictionary[key] ? Dictionary[key] : key;

            if (replace) {
                for (let prop in replace) {
                    if (replace.hasOwnProperty(prop)) {
                        translation = translation.replace(new window.RegExp(':' + prop, 'g'), replace[prop]);
                    }
                }
            }

            return translation;
        }
    }]);
