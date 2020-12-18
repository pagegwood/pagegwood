<?php


Filter::add( 'nav_menu_link_attributes', function($atts, $item, $args) {

    $atts['title'] = esc_attr( $item->title );

    return $atts;

}, 10, 3 );

