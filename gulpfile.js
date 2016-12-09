const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (min) {
    min.styles([
        'admin/css/light-bootstrap-dashboard.css'
    ] , 'public/css/admin.min.css')
})

elixir(function (min) {
    min.scripts([
            'admin/js/jquery-ui.min.js',
            'admin/js/bootstrap-checkbox-radio-switch-tags.js',
            'admin/js/jquery.sharrre.js',
            'admin/js/light-bootstrap-dashboard.js',
            'admin/js/moment.min.js'
        ] , 'admin/js/public/js/login.min.js')
        .scripts([
            'admin/js/jquery-ui.min.js',
            'admin/js/bootstrap-checkbox-radio-switch-tags.js',
            'admin/js/jquery.sharrre.js',
            'admin/js/light-bootstrap-dashboard.js',
            'admin/js/moment.min.js',
            'admin/js/inot.vip',
            'admin/js/bootstrap-selectpicker.js',
            'admin/js/chartist.min.js',
            'admin/js/sweetalert2.js',
            'admin/js/jquery.bootstrap.wizard.min.js',
            'admin/js/bootstrap-table.js',
            'admin/js/fullcalendar.min.js',

        ] , 'public/js/admin.min.js');
});
