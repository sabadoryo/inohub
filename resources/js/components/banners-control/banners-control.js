import angular from "angular";

angular
    .module('app')
    .component('bannersControl', {
        template: require('./banners-control.html'),
        controller: ['$http', 'notify', 'Upload', controller],
        bindings: {
            //
        }
    });

function controller($http, notify, Upload) {

    let $ctrl = this;

    $ctrl.banner = null;
    $ctrl.existingBannerUrl = null;

    $ctrl.$onInit = function () {
        $ctrl.getBanner();
    };

    $ctrl.getBanner = function () {
        $http
            .get('/admin/banners/get-banner')
            .then(res => {
                    $ctrl.existingBannerUrl = res.data.value_url;
                    console.log(res);
                },
                err => {
                    alert(err);
                })
    };

    $ctrl.save = function (banner) {
        Upload.upload({
            url: '/admin/banners/save',
            data: {
                banner: $ctrl.banner ? $ctrl.banner : undefined,
                key: 'banner1',
            }
        }).then(res => {
            $ctrl.existingBannerUrl = res.data;
            notify({
                message: 'Баннер успешно установлен',
                duration: 2000,
                classes: 'alert-success'
            });
        }, err => {
            alert(err);
        })
    }
}
