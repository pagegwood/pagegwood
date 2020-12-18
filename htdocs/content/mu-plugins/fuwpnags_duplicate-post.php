<?php

if (!function_exists('fuwpnags_duplicate_post_remove_whats_new')) {
    function fuwpnags_duplicate_post_remove_whats_new()
    {
        if (function_exists('duplicate_post_show_update_notice')) {

            remove_action('admin_notices', 'duplicate_post_show_update_notice');
        }
    }
}

add_action('admin_init', 'fuwpnags_duplicate_post_remove_whats_new', 100);
