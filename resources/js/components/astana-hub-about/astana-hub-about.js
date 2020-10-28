import angular from "angular";
import Swiper from 'swiper';

angular
    .module('app')
    .component('astanaHubAbout', {
        template: require('./astana-hub-about.html'),
        controller: ['$uibModal', controller],
        bindings: {
            programs: '<'
        }
    });

function controller($uibModal) {

	let $ctrl = this;

	$ctrl.$onInit = function () {
        console.log($ctrl.programs);
        setSwiper();
    };

	function setSwiper() {
        new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 24,

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

	$ctrl.openApplicationModal = () => {
        $uibModal
            .open({
                component: 'applicationModal',
                resolve: {
                    entityType: () => 'astanahub_membership',
                    entityId: () => null,
                }
            })
            .result
            .then(
                res => {

                },
                err => {

                }
            );
    };

}
