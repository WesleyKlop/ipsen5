const mix = require('laravel-mix')

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

mix
    .react('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/adminPanel.js', 'public/js')
    .sass('resources/sass/panel.scss', 'public/css', {
        includePaths: [path.resolve (__dirname, 'node_modules')],
    })
    .sass('resources/sass/admin.scss', 'public/css', {
        includePaths: [path.resolve(__dirname, 'node_modules')],
    })
    .js('resources/js/ManageSurvey.js', 'public/js')
    .sass('resources/sass/ManageSurvey.scss', 'public/css', {
        includePaths: [path.resolve(__dirname, 'node_modules')],
    })
