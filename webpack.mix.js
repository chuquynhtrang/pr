const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.copy('node_modules/sb-admin-2/dist/css/sb-admin-2.css', 'public/css/');
mix.copy('node_modules/sb-admin-2/dist/js/sb-admin-2.js', 'public/js/');
mix.copy('node_modules/font-awesome/css/font-awesome.css', 'public/css/');
mix.copy('node_modules/font-awesome/fonts', 'public/fonts');
mix.copy('node_modules/datatables/media/css/jquery.dataTables.css', 'public/css/');
mix.sass('resources/assets/sass/user.scss', 'public/css');
mix.copy('resources/assets/js/user.js', 'public/js');