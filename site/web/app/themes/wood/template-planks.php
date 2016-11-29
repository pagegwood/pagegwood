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

Timber::render( array( 'planks.twig' ), $context );
