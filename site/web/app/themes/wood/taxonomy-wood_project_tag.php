<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

use Wood\PostTypes\Project;
use Wood\PostTypes\PlankPage;

$context = Timber::get_context();
$context['posts'] = Timber::get_posts(false, 'Wood\PostTypes\Project');

$context['hero_heading'] = single_term_title("", false);

$context['pagination'] = Timber::get_pagination();

//ID of work page
// TODO: this is fragile. Fix.
$work_id = 1213;

$page = new PlankPage($work_id);

if (!empty($page) && !empty($page->planks)){
	$planks = $page->planks;
	$first_plank = $page->planks[0];

	if($first_plank->css_class == 'interior_hero'){
		$hero = $first_plank;
		$context['hero'] = $hero;
	}
	else{
		$hero = null;
	}
}

Timber::render(['project-tag.twig'], $context);
