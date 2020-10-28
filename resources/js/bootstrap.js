window._ = require('lodash');

window.Swal = require('sweetalert2/dist/sweetalert2');
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

window.grapesjs = require('grapesjs');

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

import Swiper from 'swiper';

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 4,
    spaceBetween: 24,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

