<?php

namespace Wood\Config;

use Wood\PostTypes\Project;
use Wood\PostTypes\Gallery;

class CustomPostTypes
{
    public static function register()
    {
        add_action('init', [get_called_class(), 'types']);
    }

    public static function types()
    {
        // Project
        register_post_type(
            Project::postType(),
            [
                'labels' => [
                    'name' => __('Projects'),
                    'singular_name' => __('Project')
                ],
                'public' => true,
                'has_archive' => false,
                'supports' => [
                    'title',
                    'author',
                    'editor',
                    'thumbnail'
                ],
                'rewrite' => [
                    'slug' => 'projects',
                ],
                'show_in_nav_menus' => true,
            ]
        );
        register_post_type(
            Gallery::postType(),
            [
                'labels' => [
                    'name' => __('Galleries'),
                    'singular_name' => __('Gallery')
                ],
                'public' => true,
                'has_archive' => false,
                'supports' => [
                    'title',
                    'author',
                    'editor',
                    'thumbnail'
                ],
                'show_in_nav_menus' => true,
            ]
        );
    }
}
