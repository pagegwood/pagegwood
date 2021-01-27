let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */
mix.setPublicPath('dist');

// mix.browserSync({
//     proxy: 'storyware.test',
//     host: 'storyware.test',
//     open: 'external'
// });

mix.js('assets/js/theme.js', 'dist/js/theme.min.js')
  .extract([
  ])
  .webpackConfig({
    externals: {
      "jquery": "jQuery"
    }
  })
  .sass('assets/sass/style.scss', 'dist/css')
  .sass('assets/sass/editor.scss', 'dist/css')
  .sass('assets/sass/login.scss', 'dist/css')
  .options({
    processCssUrls: false,
    postCss: [require('autoprefixer')],
  });
