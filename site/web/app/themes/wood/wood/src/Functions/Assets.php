<?php

namespace Wood\Functions;

use Wood\Functions\JsonManifest;

class Assets
{
    /**
     * En-queue required assets
     *
     * @param  string  $filter   The name of the filter to hook into
     * @param  integer $priority The priority to attach the filter with
     */
    public static function load($filter = 'wp_enqueue_scripts', $priority = 10)
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

    public static function asset_path($filename) {
      $dist_path = get_template_directory_uri() . '/dist/';
      $directory = dirname($filename) . '/';
      $file = basename($filename);
      static $manifest;

      if (empty($manifest)) {
        $manifest_path = get_template_directory() . '/dist/' . 'assets.json';
        $manifest = new JsonManifest($manifest_path);
      }

      if (array_key_exists($file, $manifest->get())) {
        return $dist_path . $directory . $manifest->get()[$file];
      } else {
        return $dist_path . $directory . $file;
      }
    }

}
