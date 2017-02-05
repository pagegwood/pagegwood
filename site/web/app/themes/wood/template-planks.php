<?php
/**
 * Template Name: Planks
 * Description: Flexible content.
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

use Wood\PostTypes\PlankPage;

$context = Timber::get_context();
$page = new PlankPage();
$context['page'] = $page;

Timber::render( array( 'planks.twig' ), $context );
