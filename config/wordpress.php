<?php

/*
|--------------------------------------------------------------------------
| Notes - README
|--------------------------------------------------------------------------
|
| You can add as many WordPress constants as you want here. Just make sure
| to add them at the end of the file or at least after the "WordPress
| authentication keys and salts" section.
|
*/

/*
|--------------------------------------------------------------------------
| WordPress authentication keys and salts
|--------------------------------------------------------------------------
|
| @link https://api.wordpress.org/secret-key/1.1/salt/
|
*/
define('AUTH_KEY',         '<{[+ahR|6Lvny;;8pBzv^@ge;mI{S|l@)V2uuy@D6<2!=km(uo`!+-}KU^6jdnn4');
define('SECURE_AUTH_KEY',  ':~Y++VjnsR^?k*0|;d5K,^o[HnCLX>p9[`x3Rd}TmU.6aeUpNoB~hd7(O|{#5_ d');
define('LOGGED_IN_KEY',    '^8ZFGlU-jjYuF-w6d+OV[K%{Io.jfQPt}CU=HR}o0dmzrt{8+j{lzZ,5_?DO8@tr');
define('NONCE_KEY',        'QRV@NQ6~SaY.+4Paf+7|q:p_G34FWHgrP-B^^<PBvDGitJPdC6lQ9+1cj-<QL8_9');
define('AUTH_SALT',        '0*ecbZ$7pV1q6(T-QhGaF%%>5wvO?~yq 7rUX]j$W-{7k|~W5$FI_9y+4}x[0c(/');
define('SECURE_AUTH_SALT', 'sCf?NS,^=6OwQL]ywDBpoe3V?G`C4Dacx~`c$DhH{NmT>ifh(Rg=*AJVGnJ%NON)');
define('LOGGED_IN_SALT',   'Z//1yV>Qh;{d;}C)kYIk@tY-yOJ+fSg({k6u;Bd2Bar,]|>J9#]]!}^<e3!X=&kr');
define('NONCE_SALT',       'KXL|4mYix$06r7/SiDW)%jJ4%6?t0{^7!k)BD=-sxBxqRA.|%4z|dV`*W0cC?f-P');

/*
|--------------------------------------------------------------------------
| WordPress database
|--------------------------------------------------------------------------
*/
define('DB_NAME', config('database.connections.mysql.database'));
define('DB_USER', config('database.connections.mysql.username'));
define('DB_PASSWORD', config('database.connections.mysql.password'));
define('DB_HOST', config('database.connections.mysql.host'));
define('DB_CHARSET', config('database.connections.mysql.charset'));
define('DB_COLLATE', config('database.connections.mysql.collation'));

/*
|--------------------------------------------------------------------------
| WordPress URLs
|--------------------------------------------------------------------------
*/
define('WP_HOME', config('app.url'));
define('WP_SITEURL', config('app.wp.url'));
define('WP_CONTENT_URL', WP_HOME.'/'.CONTENT_DIR);

/*
|--------------------------------------------------------------------------
| WordPress debug
|--------------------------------------------------------------------------
*/
define('SAVEQUERIES', config('app.debug'));
define('WP_DEBUG', config('app.debug'));
define('WP_DEBUG_DISPLAY', config('app.debug'));
define('SCRIPT_DEBUG', config('app.debug'));

/*
|--------------------------------------------------------------------------
| WordPress auto-update
|--------------------------------------------------------------------------
*/
define('WP_AUTO_UPDATE_CORE', false);


/*
|--------------------------------------------------------------------------
| WordPress Disable Cron
|--------------------------------------------------------------------------
*/

define('DISABLE_WP_CRON', 'true');

/*
|--------------------------------------------------------------------------
| WordPress file editor
|--------------------------------------------------------------------------
*/
define('DISALLOW_FILE_EDIT', true);

/*
|--------------------------------------------------------------------------
| WordPress default theme
|--------------------------------------------------------------------------
*/
define('WP_DEFAULT_THEME', 'recre');

/*
|--------------------------------------------------------------------------
| Allow WordPress file edits (and update notification)
|--------------------------------------------------------------------------
*/

define('DISALLOW_FILE_MODS', !config('app.debug'));

/*
|--------------------------------------------------------------------------
| Application Text Domain
|--------------------------------------------------------------------------
*/
define('APP_TD', env('APP_TD', 'themosis'));

/*
|--------------------------------------------------------------------------
| JetPack
|--------------------------------------------------------------------------
*/
define('JETPACK_DEV_DEBUG', config('app.debug'));


/*----------------------------------------------------*/
// Google Maps API Key (ACF,Geocoding)
/*----------------------------------------------------*/
define('GOOGLE_CLIENT_SIDE_API_KEY', env('GOOGLE_CLIENT_SIDE_API_KEY', ''));

define('GOOGLE_SERVER_SIDE_API_KEY', env('GOOGLE_SERVER_SIDE_API_KEY', ''));


/*----------------------------------------------------*/
// Offload S3
/*----------------------------------------------------*/

define( 'AS3CF_SETTINGS', serialize( array(
    'provider' => 'aws',
    'access-key-id' => env('AWS_ACCESS_KEY_ID', ''),
    'secret-access-key' => env('AWS_ACCESS_KEY_SECRET', ''),
) ) );

/*----------------------------------------------------*/
// Offload SES
/*----------------------------------------------------*/

define( 'WPOSES_AWS_ACCESS_KEY_ID',     env('AWS_ACCESS_KEY_ID', ''));
define( 'WPOSES_AWS_SECRET_ACCESS_KEY', env('AWS_ACCESS_KEY_SECRET', ''));

/*----------------------------------------------------*/
// WP-Rocket Settings
/*----------------------------------------------------*/

define('WP_ROCKET_KEY', env('WP_ROCKET_KEY', ''));

define('WP_ROCKET_EMAIL', env('WP_ROCKET_EMAIL', ''));

define('CUSTOM_CACHE_PATH', env('CUSTOM_CACHE_PATH', ''));

//define a custom cache path due to our atomic deployments
if (defined('CUSTOM_CACHE_PATH')) {
    if (CUSTOM_CACHE_PATH){
        define( 'WP_ROCKET_CACHE_ROOT_PATH', CUSTOM_CACHE_PATH);
    }
}

/*----------------------------------------------------*/
// Post Revisions
/*----------------------------------------------------*/

define('WP_POST_REVISIONS', 3);


define('UPLOADS', 'content/uploads' );
