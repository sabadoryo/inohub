const mix = require('laravel-mix');

mix.sass('resources/control-panel/control-panel.scss', 'public/css');
mix.sass('resources/main/main.scss', 'public/css');
mix.sass('resources/main/ui-components.scss', 'public/css');

mix.copy('node_modules/admin-lte/dist/css/adminlte.min.css', 'public/css');
mix.copy('node_modules/grapesjs/dist/css/grapes.min.css', 'public/css');

mix.js('resources/js/app.js', 'public/js').extract([
    'lodash',
    'popper.js',
    'jquery',
    'angular',
    'angular-animate',
    'angular-touch',
    'angular-sanitize',
    'angular1-ui-bootstrap4',
    'angular-filter',
    'angular-scroll',
    'ng-file-upload',
    'sweetalert2',
    'moment',
    'overlayscrollbars/js/jquery.overlayScrollbars',
    '@cgross/angular-notify',
    'textangular',
]).sourceMaps();

if (mix.inProduction()) {
    mix.version();
}

mix.disableNotifications();
