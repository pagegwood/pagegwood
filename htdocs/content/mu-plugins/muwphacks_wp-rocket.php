<?php

if (!function_exists('muwphacks_wprocket_remove_post_metabox')) {
    function muwphacks_wprocket_remove_post_metabox()
    {
        foreach (get_post_types() as $postType) {
            remove_meta_box('rocket_post_exclude', $postType, 'normal');
        }
    }
}

add_action('admin_menu', 'muwphacks_wprocket_remove_post_metabox');
