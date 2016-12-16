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

elixir.config.sourcemaps = false;

elixir(function (min) {
    min.styles([
            'admin/light-bootstrap-dashboard.css'
        ] , 'public/css/admin.min.css')
        .styles([
            'home/style.css'
        ] , 'public/css/all.css');
});

elixir(function (min) {
    min.scripts([
            'admin/jquery-ui.min.js',
            'admin/bootstrap-checkbox-radio-switch-tags.js',
            'admin/jquery.sharrre.js',
            'admin/light-bootstrap-dashboard.js',
            'admin/moment.min.js'
        ] , 'public/js/login.min.js')
        .scripts([
            'admin/bootstrap-checkbox-radio-switch-tags.js'
        ] , 'public/js/form.min.js')
        .scripts([
            'admin/jquery.sharrre.js'
        ] , 'public/js/sharrre.min.js')
        .scripts([
            'admin/light-bootstrap-dashboard.js'
        ] , 'public/js/ubar.min.js')
        .scripts([
            'admin/bootstrap-selectpicker.js'
        ] , 'public/js/selectpicker.min.js')
        .scripts([
            'admin/sweetalert2.js'
        ] , 'public/js/sweetalert.min.js')
        .scripts([
            'admin/bootstrap-table.js'
        ] , 'public/js/table.min.js')
        .scripts([
            'home/ajax_comment.js',
            'home/functions.js'
        ] , 'public/js/all.js');
});
