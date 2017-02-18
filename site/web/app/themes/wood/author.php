<?php
/**
 * The template for displaying Author Archive pages
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */
global $wp_query;

use Wood\PostTypes\PostsPage;

$context = Timber::get_context();

$page = new PostsPage(get_option( 'page_for_posts' ));

$context['page'] = $page;

$context['posts'] = Timber::get_posts();
if ( isset( $wp_query->query_vars['author'] ) ) {
	$author = new TimberUser( $wp_query->query_vars['author'] );
	$context['author'] = $author;
	$context['title'] = 'Posts by ' . $author->name();
}


$context['archive'] = true;

Timber::render( 'index.twig', $context );
