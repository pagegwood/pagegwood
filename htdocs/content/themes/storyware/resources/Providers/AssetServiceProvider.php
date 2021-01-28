<?php

namespace Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Themosis\Core\ThemeManager;
use Themosis\Support\Facades\Asset;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Theme Assets
     *
     * Here we define the loaded assets from our previously defined
     * "dist" directory. Assets sources are located under the root "assets"
     * directory and are then compiled, thanks to Laravel Mix, to the "dist"
     * folder.
     *
     * @see https://laravel-mix.com/
     */
    public function register()
    {
        /** @var ThemeManager $theme */
        $theme = $this->app->make('wp.theme');

        Asset::add('google_fonts', '//fonts.googleapis.com/css?family=Merriweather:300,300i|Raleway:400,400i,500,600', [], '1.0')->setType('style')->to('front');

        Asset::add('theme_styles', 'css/style.css', ['google_fonts'], $theme->getHeader('version'))->to('front');

        Asset::add('manifest_js', 'js/manifest.js', ['jquery'], $theme->getHeader('version'))->to('front');
        Asset::add('vendor_js', 'js/vendor.js', ['manifest_js'], $theme->getHeader('version'))->to('front');
        Asset::add('theme_js', 'js/theme.min.js', ['vendor_js'], $theme->getHeader('version'))->to('front');

        Asset::add('login_styles', 'css/login.css', [], $theme->getHeader('version'))->to('login');
    }
}
