<?php
/**
 * Template Name: Planks
 * Description: Flexible content.
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;


use Illuminate\Support\Collection;
use Wood\Planks\Planker as Planker;

$planks = get_field("wood_planks");

if(is_array($planks)){
	foreach ($planks as &$plank) {

    $plank = Planker::createPlank($plank);

	}
	$context['planks'] = Collection::make($planks);
}

Timber::render( array( 'planks.twig' ), $context );
