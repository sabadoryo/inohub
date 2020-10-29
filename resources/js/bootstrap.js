window._ = require('lodash');

window.Swal = require('sweetalert2/dist/sweetalert2');
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

window.grapesjs = require('grapesjs');

require('chart.js');
require('bootstrap');
require('overlayscrollbars/js/jquery.overlayScrollbars');
// import Echo from 'laravel-echo';s

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

require('admin-lte/build/js/AdminLTE');

window.PerfectScrollbar = require('perfect-scrollbar').default;

window.Swiper = require('swiper/swiper-bundle.js');

$( document ).ready(function() {
    var swiper = new Swiper('.swiper-2-slides', {
        slidesPerView: 2,
        spaceBetween: 24,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiper2 = new Swiper('.swiper-4-slides', {
        slidesPerView: 4,
        spaceBetween: 24,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    var swiper3 = new Swiper('.swiper-3-slides', {
        slidesPerView: 3,
        spaceBetween: 24,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
// var swiper = new Swiper('.swiper-container', {
//     slidesPerView: 2,
//     spaceBetween: 24,
//
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
//     pagination: {
//         el: '.swiper-pagination',
//     },
// });

// var swiper = new Swiper('.swiper-container-2', {
//     slidesPerView: 2,
//     spaceBetween: 24,
//
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//     },
// });

