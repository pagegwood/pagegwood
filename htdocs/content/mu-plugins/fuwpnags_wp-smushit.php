<?php

if (!function_exists('fuwpnags_wpsmushit_remove_email_notice')) {
    function fuwpnags_wpsmushit_remove_email_notice()
    {
        if (class_exists('WDev_Frash')) {
            remove_action('load-index.php', [WDev_Frash::instance(), 'load_index_php'], 5, 1);
        }
    }
}

add_action('admin_init', 'fuwpnags_wpsmushit_remove_email_notice');

add_filter('pre_option_wp-smush-hide_upgrade_notice', '__return_true', PHP_INT_MAX);

add_filter('pre_site_option_wp-smush-hide_update_info', '__return_true', PHP_INT_MAX);

add_filter('pre_site_option_wp-smush-hide_upgrade_notice', '__return_true', PHP_INT_MAX);
