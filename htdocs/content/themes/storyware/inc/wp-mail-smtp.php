<?php


Action::add( 'admin_menu', function() {

    if (function_exists('wp_mail_smtp')) {

        remove_menu_page('wp-mail-smtp');

        add_submenu_page('options-general.php','WP Mail SMTP', 'WP Mail SMTP','manage_options', 'wp-mail-smtp' );
    }
}, 99);
