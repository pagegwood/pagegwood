<?php



if (is_admin()) {

    add_filter('mce_buttons_2', function ($buttons) {

        array_unshift($buttons, 'fontselect', 'styleselect');

        return $buttons;
    });

    add_filter('mce_buttons_3', function ($buttons) {

        global $post;

        array_push($buttons, 'button');
        array_push($buttons, 'mediaEmbed');

        return $buttons;
    });

    add_filter('mce_external_plugins', function ($plugins) {

        $theme = app('wp.theme');

        $version = $theme->getHeader('version');

        $plugins['button'] = $theme->getUrl('assets/js/tinymce/plugins/buttons/button.js?=' . $version);

        $plugins['mediaEmbed'] = $theme->getUrl('assets/js/tinymce/plugins/buttons/media-embed.js?=' . $version);

        return $plugins;
    });

    add_filter( 'tiny_mce_before_init', function ($settings) {

        $style_formats = array(
          array(
            'title' => 'Font Weight',
            'items'=> array(
              array(
                'block' => 'span',
                'classes' => 'weight-light',
                'title' => 'Light Weight'
            ),
              array(
                'block' => 'span',
                'classes' => 'weight-normal',
                'title' => 'Normal Weight'
            ),
              array(
                'block' => 'span',
                'classes' => 'weight-medium',
                'title' => 'Medium Weight'
            ),
              array(
                'block' => 'span',
                'classes' => 'weight-seemibold',
                'title' => 'Semi Bold Weight'
            ),
              array(
                'block' => 'span',
                'classes' => 'weight-bold',
                'title' => 'Bold Weight'
            )
          )
        ),
          array(
            'title' => 'Font Style',
            'items'=> array(
              array(
                'block' => 'span',
                'classes' => 'text-uppercase',
                'title' => 'All Caps'
            )
          )
        ),
          array(
            'title' => 'Headings - Span',
            'items'=> array(
              array(
                'block' => 'span',
                'classes' => 'size-hero',
                'Heading Hero'
            ),
              array(
                'block' => 'span',
                'classes' => 'size-h1',
                'title' => 'Heading 1'
            ),
              array(
                'block' => 'span',
                'classes' => 'size-h2',
                'title' => 'Heading 2'
            ),
              array(
                'block' => 'span',
                'classes' => 'size-h3',
                'title' => 'Heading 3'
            ),
              array(
                'block' => 'span',
                'classes' => 'size-h4',
                'title' => 'Heading 4'
            ),
              array(
                'block' => 'span',
                'classes' => 'size-h5',
                'title' => 'Heading 5'
            ),
              array(
                'block' => 'span',
                'classes' => 'size-h6',
                'title' => 'Heading 6'
            )
          )
        ),
          array(
            'title' => 'Headings - h1',
            'items'=> array(
              array(
                'block' => 'h1',
                'classes' => 'size-hero',
                'Heading Hero'
            ),
              array(
                'block' => 'h1',
                'classes' => 'size-h1',
                'title' => 'Heading 1'
            ),
              array(
                'block' => 'h1',
                'classes' => 'size-h2',
                'title' => 'Heading 2'
            ),
              array(
                'block' => 'h1',
                'classes' => 'size-h3',
                'title' => 'Heading 3'
            ),
              array(
                'block' => 'h1',
                'classes' => 'size-h4',
                'title' => 'Heading 4'
            ),
              array(
                'block' => 'h1',
                'classes' => 'size-h5',
                'title' => 'Heading 5'
            ),
              array(
                'block' => 'h1',
                'classes' => 'size-h6',
                'title' => 'Heading 6'
            )
          )
        ),
          array(
            'title' => 'Headings - h2',
            'items'=> array(
              array(
                'block' => 'h2',
                'classes' => 'size-hero',
                'Heading Hero'
            ),
              array(
                'block' => 'h2',
                'classes' => 'size-h1',
                'title' => 'Heading 1'
            ),
              array(
                'block' => 'h2',
                'classes' => 'size-h2',
                'title' => 'Heading 2'
            ),
              array(
                'block' => 'h2',
                'classes' => 'size-h3',
                'title' => 'Heading 3'
            ),
              array(
                'block' => 'h2',
                'classes' => 'size-h4',
                'title' => 'Heading 4'
            ),
              array(
                'block' => 'h2',
                'classes' => 'size-h5',
                'title' => 'Heading 5'
            ),
              array(
                'block' => 'h2',
                'classes' => 'size-h6',
                'title' => 'Heading 6'
            )
          )
        ),
          array(
            'title' => 'Headings - h3',
            'items'=> array(
              array(
                'block' => 'h3',
                'classes' => 'size-hero',
                'Heading Hero'
            ),
              array(
                'block' => 'h3',
                'classes' => 'size-h1',
                'title' => 'Heading 1'
            ),
              array(
                'block' => 'h3',
                'classes' => 'size-h2',
                'title' => 'Heading 2'
            ),
              array(
                'block' => 'h3',
                'classes' => 'size-h3',
                'title' => 'Heading 3'
            ),
              array(
                'block' => 'h3',
                'classes' => 'size-h4',
                'title' => 'Heading 4'
            ),
              array(
                'block' => 'h3',
                'classes' => 'size-h5',
                'title' => 'Heading 5'
            ),
              array(
                'block' => 'h3',
                'classes' => 'size-h6',
                'title' => 'Heading 6'
            )
          )
        ),
          array(
            'title' => 'Headings - h4',
            'items'=> array(
              array(
                'block' => 'h4',
                'classes' => 'size-hero',
                'Heading Hero'
            ),
              array(
                'block' => 'h4',
                'classes' => 'size-h1',
                'title' => 'Heading 1'
            ),
              array(
                'block' => 'h4',
                'classes' => 'size-h2',
                'title' => 'Heading 2'
            ),
              array(
                'block' => 'h4',
                'classes' => 'size-h3',
                'title' => 'Heading 3'
            ),
              array(
                'block' => 'h4',
                'classes' => 'size-h4',
                'title' => 'Heading 4'
            ),
              array(
                'block' => 'h4',
                'classes' => 'size-h5',
                'title' => 'Heading 5'
            ),
              array(
                'block' => 'h4',
                'classes' => 'size-h6',
                'title' => 'Heading 6'
            )
          )
        ),
      );

$custom_colours =  '[
"0991B4", "Blue",
"09BEB2", "Aqua",
"00A76D", "Dark Green",
"09BE4C", "Lighter Green",
"09B418", "Lightest Green",
"333333", "Text",
"fdfdfd", "Light Gray"
]';

$settings['textcolor_map'] = $custom_colours;

$settings['style_formats'] = json_encode( $style_formats );

$settings['font_formats'] = implode(
  ';',
  array(
    'Raleway=Raleway, sans-serif',
    'Merriweather=Merriweather,serif'
)
);

return $settings;
});

    add_filter('tiny_mce_before_init', function ($mce_init) {

        $theme = app('wp.theme');

        $version = $theme->getHeader('version');

        // make sure we don't override other custom <code>content_css</code> files
        $content_css = $theme->getUrl('dist/css/editor.css?=' . $version);

        if (isset($mce_init['content_css'])) {
            $content_css_new =  $mce_init['content_css'] . ',' . $content_css;

            $mce_init['content_css'] = $content_css_new;
        }


        return $mce_init;
    });
}
