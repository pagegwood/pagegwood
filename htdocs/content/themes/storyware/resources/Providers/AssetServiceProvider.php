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

        Asset::add('typekit_fonts', '//use.typekit.net/zwt7bzy.css', [], '1.0')->to('front')->to('admin');

        Asset::add('sw_fonts', 'css/fonts.css', ['typekit_fonts'], '1.0')->to('front')->to('admin');
        Asset::add('theme_styles', 'css/style.css', ['sw_fonts'], $theme->getHeader('version'))->to('front');
        Asset::add('manifest_js', 'js/manifest.js', ['jquery'], $theme->getHeader('version'))->to('front');
        Asset::add('vendor_js', 'js/vendor.js', ['manifest_js'], $theme->getHeader('version'))->to('front');
        Asset::add('theme_js', 'js/theme.min.js', ['vendor_js'], $theme->getHeader('version'))->to('front');

        Asset::add('admin_styles', 'css/admin.css', [], $theme->getHeader('version'))->to('admin');
        Asset::add('login_styles', 'css/login.css', [], $theme->getHeader('version'))->to('login');
    }
}
