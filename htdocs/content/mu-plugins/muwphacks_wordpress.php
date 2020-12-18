<?php

if (!function_exists('muwphacks_wp_remove_comments_from_admin_menu_bar')) {
    function muwphacks_wp_remove_comments_from_admin_menu_bar()
    {
        global $wp_admin_bar;

        $wp_admin_bar->remove_menu('comments');
    }
}

add_action('admin_bar_menu', 'muwphacks_wp_remove_comments_from_admin_menu_bar', PHP_INT_MAX);

if (!function_exists('muwphacks_wp_remove_comments_from_admin_menu')) {
    function muwphacks_wp_remove_comments_from_admin_menu()
    {
        remove_menu_page('edit-comments.php');
    }
}

add_action('admin_menu', 'muwphacks_wp_remove_comments_from_admin_menu');

if (!function_exists('muwphacks_wp_remove_comment_rewrite_rules')) {
    function muwphacks_wp_remove_comment_rewrite_rules(array $rules)
    {
        return [];
    }
}

add_filter('comments_rewrite_rules', 'muwphacks_wp_remove_comment_rewrite_rules');

if (!function_exists('muwphacks_wp_remove_welcome_panel')) {
    function muwphacks_wp_remove_welcome_panel()
    {
        remove_action('welcome_panel', 'wp_welcome_panel');
    }
}

add_action('admin_init', 'muwphacks_wp_remove_welcome_panel');

if (!function_exists('muwphacks_wp_set_search_parameter')) {
    function muwphacks_wp_set_search_parameter(WP_Query $query)
    {
        if ($query->is_search && empty($_GET['s'])) {
            $search = $query->get('s');

            if (empty($search) === false) {
                $query->set('s', urldecode($search));

                $_REQUEST['s'] = $_GET['s'] = $search;

                add_filter('muwphacks/wp/search/redirect', '__return_false');
            }
        }
    }
}

add_action('pre_get_posts', 'muwphacks_wp_set_search_parameter', -PHP_INT_MAX);

if (!function_exists('muwphacks_wp_redirect_search_url')) {
    function muwphacks_wp_redirect_search_url()
    {
        if (empty($_GET['s']) === false && apply_filters('muwphacks/wp/search/redirect', true)) {
            wp_redirect(get_search_link());

            exit;
        }
    }
}

add_action('template_redirect', 'muwphacks_wp_redirect_search_url');
