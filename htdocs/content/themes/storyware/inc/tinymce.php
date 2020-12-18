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

    add_filter('tiny_mce_before_init', function ($settings) {

        $style_formats = array(
            array(
                'title' => 'Font Weight',
                'items' => array(
                    array(
                        'block' => 'span',
                        'classes' => 'font-thin',
                        'title' => 'Thin'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-light',
                        'title' => 'Light'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-normal',
                        'title' => 'Normal'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-medium',
                        'title' => 'Medium'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-semibold',
                        'title' => 'SemiBold'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-bold',
                        'title' => 'Bold'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-extrabold',
                        'title' => 'ExtraBold'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'font-heavy',
                        'title' => 'Heavy'
                    )
                )
            ),
            array(
                'title' => 'Font Style',
                'items' => array(
                    array(
                        'block' => 'span',
                        'classes' => 'uppercase',
                        'title' => 'All Caps'
                    )
                )
            ),
            array(
                'title' => 'Headings - Span',
                'items' => array(
                    array(
                        'block' => 'span',
                        'classes' => 'text-h1',
                        'title' => 'Heading 1'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'text-h2',
                        'title' => 'Heading 2'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'text-h3',
                        'title' => 'Heading 3'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'text-h4',
                        'title' => 'Heading 4'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'text-h5',
                        'title' => 'Heading 5'
                    ),
                    array(
                        'block' => 'span',
                        'classes' => 'text-h6',
                        'title' => 'Heading 6'
                    )
                )
            ),
            array(
                'title' => 'Headings - h1',
                'items' => array(
                    array(
                        'block' => 'h1',
                        'classes' => 'text-h1',
                        'title' => 'Heading 1'
                    ),
                    array(
                        'block' => 'h1',
                        'classes' => 'text-h2',
                        'title' => 'Heading 2'
                    ),
                    array(
                        'block' => 'h1',
                        'classes' => 'text-h3',
                        'title' => 'Heading 3'
                    ),
                    array(
                        'block' => 'h1',
                        'classes' => 'text-h4',
                        'title' => 'Heading 4'
                    ),
                    array(
                        'block' => 'h1',
                        'classes' => 'text-h5',
                        'title' => 'Heading 5'
                    ),
                    array(
                        'block' => 'h1',
                        'classes' => 'text-h6',
                        'title' => 'Heading 6'
                    )
                )
            ),
            array(
                'title' => 'Headings - h2',
                'items' => array(
                    array(
                        'block' => 'h2',
                        'classes' => 'text-h1',
                        'title' => 'Heading 1'
                    ),
                    array(
                        'block' => 'h2',
                        'classes' => 'text-h2',
                        'title' => 'Heading 2'
                    ),
                    array(
                        'block' => 'h2',
                        'classes' => 'text-h3',
                        'title' => 'Heading 3'
                    ),
                    array(
                        'block' => 'h2',
                        'classes' => 'text-h4',
                        'title' => 'Heading 4'
                    ),
                    array(
                        'block' => 'h2',
                        'classes' => 'text-h5',
                        'title' => 'Heading 5'
                    ),
                    array(
                        'block' => 'h2',
                        'classes' => 'text-h6',
                        'title' => 'Heading 6'
                    )
                )
            ),
            array(
                'title' => 'Headings - h3',
                'items' => array(
                    array(
                        'block' => 'h3',
                        'classes' => 'text-h1',
                        'title' => 'Heading 1'
                    ),
                    array(
                        'block' => 'h3',
                        'classes' => 'text-h2',
                        'title' => 'Heading 2'
                    ),
                    array(
                        'block' => 'h3',
                        'classes' => 'text-h3',
                        'title' => 'Heading 3'
                    ),
                    array(
                        'block' => 'h3',
                        'classes' => 'text-h4',
                        'title' => 'Heading 4'
                    ),
                    array(
                        'block' => 'h3',
                        'classes' => 'text-h5',
                        'title' => 'Heading 5'
                    ),
                    array(
                        'block' => 'h3',
                        'classes' => 'text-h6',
                        'title' => 'Heading 6'
                    )
                )
            ),
            array(
                'title' => 'Headings - h4',
                'items' => array(
                    array(
                        'block' => 'h4',
                        'classes' => 'text-h1',
                        'title' => 'Heading 1'
                    ),
                    array(
                        'block' => 'h4',
                        'classes' => 'text-h2',
                        'title' => 'Heading 2'
                    ),
                    array(
                        'block' => 'h4',
                        'classes' => 'text-h3',
                        'title' => 'Heading 3'
                    ),
                    array(
                        'block' => 'h4',
                        'classes' => 'text-h4',
                        'title' => 'Heading 4'
                    ),
                    array(
                        'block' => 'h4',
                        'classes' => 'text-h5',
                        'title' => 'Heading 5'
                    ),
                    array(
                        'block' => 'h4',
                        'classes' => 'text-h6',
                        'title' => 'Heading 6'
                    )
                )
            ),
        );

        $custom_colours =  '[
      "000000", "Black",
      "FFFFFF", "White",
      "026EFE", "Brand - Primary",
      "029E18", "Brand - Secondary",
      "D9C89E", "Gold",
      "EDEDED", "Light Gray",
      "676767", "Medium Gray",
      "262626", "Dark Gray",
      "A6BBC8", "Slate Gray"
    ]';


        $settings['textcolor_map'] = $custom_colours;

        $settings['style_formats'] = json_encode($style_formats);

        $settings['font_formats'] = implode(
            ';',
            array(
                'Open Sans=Open Sans',
                'Freight Sans Pro=freight-sans-pro',
                'Le Monde Livre Classic BYOL=le-monde-livre-classic-byol'
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
        }

        $mce_init['content_css'] = $content_css_new;

        return $mce_init;
    });
}
