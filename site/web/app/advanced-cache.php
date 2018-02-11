<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path = '/srv/www/pagegwood.com/current/web/app/cache/wp-rocket/';
$rocket_config_path = '/srv/www/pagegwood.com/current/web/app/wp-rocket-config/';

if ( file_exists( '/srv/www/pagegwood.com/current/web/app/plugins/wp-rocket/inc/front/process.php' ) ) {
	include '/srv/www/pagegwood.com/current/web/app/plugins/wp-rocket/inc/front/process.php';
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}