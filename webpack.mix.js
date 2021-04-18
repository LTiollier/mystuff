const path = require('path')
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

/** @see https://github.com/JaKXz/stylelint-webpack-plugin */
var StyleLintPlugin = require('stylelint-webpack-plugin');

mix
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .copy('resources/js/anime.min.js', 'public/js')
    .copy('resources/js/charming.min.js', 'public/js')
    .vue()
    .webpackConfig({
        devtool: 'inline-source-map',
        output: { chunkFilename: 'js/[name].js?id=[chunkhash]' },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/js'),
            },
        },
        module: {
            rules: [
                {
                    enforce: 'pre',
                    test: /\.(js|vue)$/,
                    loader: 'eslint-loader',
                    exclude: /node_modules/,
                    options: {
                        fix: true,
                        quiet: false,
                        failOnWarning: true,
                        failOnError: true,
                    }
                }
            ]
        },
        plugins: [
            new StyleLintPlugin({
                fix: true,
                configFile: path.resolve(__dirname, '.stylelintrc'),
                context: path.resolve(__dirname, 'resources/sass/' ),
                lintDirtyModulesOnly: false, // on vérifie seulement les fichiers modifiés : true|false
                emitErrors: true,
            }),
        ],
    })
    .version()
    .sourceMaps()
    .extract([
        'vue',
        'lodash',
        'axios',
    ])
    .browserSync({
        host: 'my-stuff.test',
        proxy: process.env.APP_URL,
        open: true,
        files: [
            'app/**/*.php',
            'resources/views/**/*.php',
            'public/js/*.js',
            'public/*.js',
            'public/css/*.css'
        ],
        watchOptions: {
            usePolling: true,
            interval: 500
        }
    })

if (mix.inProduction()) {
    mix.options({ uglify: { uglifyOptions: { compress: { drop_console: true, } } } });
}
