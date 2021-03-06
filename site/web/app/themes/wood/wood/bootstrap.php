<?php
namespace Wood;
use Wood\Core\Site;
use Wood\Config\ThemeSupport;
use Wood\Config\CustomPostTypes;
use Wood\Config\CustomTaxonomies;
use Wood\Config\TinyMce;
use Wood\Config\Menus;
use Wood\Functions\Assets;

require_once('autoload.php');

define('ASSETS_MANIFEST', get_stylesheet_directory() . "/dist/assets.json");
define('ASSETS_URI', get_stylesheet_directory_uri() . "/dist");

/**
 * ------------------
 * Core
 * ------------------
 */
// Set up the default Timber context & extend Twig for the site
new Site;
/**
 * ------------------
 * Config
 * ------------------
 */
// Register support of certain theme features
ThemeSupport::register();
// Register any custom taxonomies
CustomTaxonomies::register();
// Register any custom post types
CustomPostTypes::register();
// Customize TinyMce
TinyMce::register();
// Register WordPress menus
Menus::register();
