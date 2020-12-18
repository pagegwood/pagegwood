<?php

namespace Wood\Core;

use TimberSite;
use TimberHelper;
use Twig_SimpleFilter;
use Wood\Core\Menu;
use Wood\Functions\JsonManifest;

class Site extends TimberSite
{
    static $json_manifest;

    public function __construct()
    {
        add_filter('get_twig', [$this, 'addToTwig']);
        add_filter('timber_context', [$this, 'addToContext']);
        add_filter('get_twig', [$this, 'addToTwig']);

        self::$json_manifest = new JsonManifest(ASSETS_MANIFEST, ASSETS_URI);
        self::loadAssets();

        parent::__construct();
    }

    public function addToContext($data)
    {
        $data['is_home'] = is_home();
        $data['is_front_page'] = is_front_page();
        $data['is_logged_in'] = is_user_logged_in();

        // Get the page title, and prefix it with ' | ' if it exists (for use in html title)
        $data['wp_title'] = TimberHelper::function_wrapper('wp_title', ['|', false, 'right']);

        // In Timber, you can use TimberMenu() to make a standard Wordpress menu available to the
        // Twig template as an object you can loop through. And once the menu becomes available to
        // the context, you can get items from it in a way that is a little smoother and more
        // versatile than Wordpress's wp_nav_menu. (You need never again rely on a
        // crazy "Walker Function!")
        $data['menu'] = new Menu('main-nav');

        return $data;
    }

    public function addToTwig($twig)
    {
        // this is where you can add your own functions to twig
        // $twig->addExtension(new Twig_Extension_StringLoader());
        // $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));

        $twig->addFilter(new Twig_SimpleFilter('asset_path', [$this, 'asset_path']));

        return $twig;
    }

    public static function loadAssets($filter = 'wp_enqueue_scripts', $priority = 10)
    {
        // Register the filter
        add_filter($filter, function ($paths) {
            wp_deregister_script('jquery');

            // Load CDN jQuery in the footer
            wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, null, true);

            wp_enqueue_style('wood/css', self::asset_path('styles/main.css'), false, null);

            wp_enqueue_style('wood-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300,300i|Raleway:400,400i,500,600', false);

            wp_enqueue_script('wood/js', self::asset_path('scripts/main.js'), ['jquery'], null, true);

            wp_enqueue_script('jquery');
        });

        add_action( 'wp_enqueue_scripts', function(){
          if(! is_page('contact'))
           {
              wp_dequeue_script('contact-form-7'); // Dequeue JS Script file.
              wp_dequeue_style('contact-form-7');  // Dequeue CSS file.
           }
        });

    }

    public static function asset_path($asset) {

      return self::$json_manifest->getUri($asset);
    }
}
