const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

// Admin styles
mix.styles('resources/css/admin/app.css', 'public/css/admin/app.css')
    .styles([
        'resources/css/admin/coreui.min.css',
        'resources/css/admin/font-awesome.min.css',
        'resources/css/admin/pace.min.css',
        'resources/css/admin/pikaday.css',
        'resources/css/admin/alertifyjs.css',
    ], 'public/css/admin/vendor.css')
;

// Admin font awesome fonts
mix.copyDirectory('resources/fonts', 'public/css/fonts');

// Admin JS
mix.scripts('resources/js/admin/app.js', 'public/js/admin/app.js'
    ).scripts([
        'resources/js/admin/jquery.min.js',
        'resources/js/admin/popper.min.js',
        'resources/js/admin/bootstrap.min.js',
        'resources/js/admin/pace.min.js',
        'resources/js/admin/pikaday.js',
        'resources/js/admin/coreui.min.js',
        'resources/js/admin/alertifyjs.js',
    ], 'public/js/admin/vendor.js')
;

if (mix.inProduction()) {
    mix.version();
}
