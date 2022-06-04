const mix = require('laravel-mix');
const glob = require('glob');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

/**
 * Javascript
 */
 glob.sync('**/*.js', {cwd: 'resources/js'}).map(function (file) {
    mix.babel('resources/js/' + file, 'public/js/' + file)
        .version();
});

/**
 * package
 */
// mix.copyDirectory('resources/vendor', 'public/vendor')
//     .version();

/**
 * scss
 */
glob.sync('**/*.scss', {cwd: 'resources/scss'}).map(function (file) {
    mix.sourceMaps(true, 'source-map')
        .sass('resources/scss/' + file, 'public/css/' + file.split('.')[0] + '.css')
        .version();
});

/**
 * image
 */
//  mix.copyDirectory('resources/img', 'public/img')
//  .version();

/**
 * excel
 */
//  mix.copyDirectory('resources/excel', 'public/excel')
//  .version();

/**
 * Breeze
 */
mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);


mix.webpackConfig({
    stats: {
         children: true
    }
});