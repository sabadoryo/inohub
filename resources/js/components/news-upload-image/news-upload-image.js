import angular from "angular";

angular
    .module('app')
    .component('newsUploadImage', {
        template: require('./news-upload-image.html'),
        controller: [controller],
        bindings: {
            resolve: '<',
            close: '&',
            dismiss: '&'
        }
    });
    
function controller() {
 
	let $ctrl = this;
	
	$ctrl.$onInit = function () {
        $ctrl.croppedImage = null;
        $ctrl.image = null;
        $ctrl.invalidImg = null;

        $ctrl.save = function () {
            $ctrl.close({
                $value: $ctrl.image
            });
        };
    };
}