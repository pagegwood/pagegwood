<?php


Filter::add('acf/settings/save_json', function( $path ) {

    $path = get_stylesheet_directory() . '/acf-json';

    return $path;
});


Filter::add('acf/settings/load_json', function( $paths ) {

    unset($paths[0]);

    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
});

// change the sub field used in flexible content field title
Filter::add('acf_flexible_content_title_field', function($title_field, $flexible_field, $layout) {

  return 'sw_block_title';
}, 10, 3);

