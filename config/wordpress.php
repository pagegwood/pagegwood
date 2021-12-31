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
define('AUTH_KEY',         'ts>3ioY;-$*J|S!VyJ)~d(f,M77&.@b|pq/E|1P3$A=)|-E[4,+Fx<8+Q2|/.MU>');
define('SECURE_AUTH_KEY',  'u4!v*}_UWK;[RJ.3y}-e(5h:gQm|qK]]`8k=[p%pz(k_Y{$t{|Q&F/253Bc%]Wd^');
define('LOGGED_IN_KEY',    '_ejzzYrYjg5#/?4J%bLPHh-c{NCTq`!Nl&Mwd$.PMeBoSc)ZJ[Vw&~}=?4Gd)xRe');
define('NONCE_KEY',        '!TvJR%j?YY!2f<mg3H,q$cx+n8_$biKu_uzRg7Uh$m-HY%ZmC5LJ?8DA-pd}/%qk');
define('AUTH_SALT',        ' A._e#S4q!TzwuL~Z&u|1w@o>q|Wz<b:L9kl=oQs+2-L~qR+ECkEw|}t_|+%#i2a');
define('SECURE_AUTH_SALT', 'iU*XG(zc+9|qdUYno3aF%A[R-fH`M!%$wkl9/*7FX@n12qEhw+eyUIL^J~IB.=jh');
define('LOGGED_IN_SALT',   'W,IQ!C$Oi+Pjf]wp}1YqpD|)|CP+)2+6|`D}u}TlNP+YPEjfBGx*QouPMc!-b1&r');
define('NONCE_SALT',       'XX3>`!a!<?k/*Z*2Nv&S@Z J/oU>(|Hxrc>v[WDLA1-*`@n+fy)br#qP+W@zG:2<');

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

define('DISALLOW_FILE_MODS', !config('app.debug'));


/*
|--------------------------------------------------------------------------
| WordPress default theme
|--------------------------------------------------------------------------
*/
define('WP_DEFAULT_THEME', 'storyware');

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
// Post Revisions
/*----------------------------------------------------*/

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

define('WP_POST_REVISIONS', 3);


