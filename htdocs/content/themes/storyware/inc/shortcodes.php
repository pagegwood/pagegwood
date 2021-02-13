<?php


add_shortcode('sw_button', function ($attributes, $content) {

    $attributes = shortcode_atts([
        'target' => '_self',
        'url' => null,
        'style' => 'default'
    ], $attributes );

    return '<a class="Button Button--' . $attributes['style'] . '" href="'.  $attributes['url'] .'" target="'.  $attributes['target'] .'">' . do_shortcode( $content ) . '</a>';
});

add_shortcode('sw_call_out', function ($attributes, $content) {

    return '<div class="CallOut">' . do_shortcode( $content ) . '</div>';
});

add_shortcode('sw_media_embed', function ($attributes, $content) {

    global $wp_embed;

    extract(shortcode_atts(array('aspect_ratio' => '16by9' , 'max_width' => null), $attributes));

    if (!is_null($content)) {

      if (filter_var($content, FILTER_VALIDATE_URL) == true ) {
        $media = $wp_embed->shortcode(array(), $content);
      }
      else {
        $media = $content;
      }
    }

    return View::make('partials.media-embed', compact('aspect_ratio', 'media', 'max_width'));
});


add_shortcode('wood_expanded_image', function($atts, $content = null){

    return '<div class="ExpandedImage">' . $content . '</div>';
});

