<?php

namespace Wood\Config;

class ThemeSupport
{
    public static function register()
    {
        add_theme_support('post-formats');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_filter( 'upload_mimes', [get_called_class(), 'addSvg']);
        add_filter( 'comment_form_defaults', [get_called_class(), 'customizeCommentForm']);
        add_filter( 'comment_form_fields', [get_called_class(), 'customizeCommentFormFields']);
        add_filter( 'comment_form_field_comment', [get_called_class(), 'customizeCommentField']);
    }

    public static function addSvg($mimes)
    {
    	$mimes['svg'] = 'image/svg+xml';
		return $mimes;
    }

    public static function customizeCommentForm($defaults)
    {

        $defaults['title_reply'] = '';
        $defaults['comment_notes_before'] = '';
        $defaults['class_submit'] = 'Button Button--two';
        return $defaults;
    }

    public static function customizeCommentFormFields($fields)
    {

        $comment_field = $fields['comment'];

        unset( $fields['comment'] );
        //bump comment field to
        $fields['comment'] = $comment_field;

        $fields['author'] = str_replace(
            '<input',
            '<input placeholder="'
            /* Replace 'theme_text_domain' with your theme’s text domain.
             * I use _x() here to make your translators life easier. :)
             * See http://codex.wordpress.org/Function_Reference/_x
             */
                . __(
                    'Jane Smith',
                    'comment form placeholder',
                    'wood'
                    )
                . '"',
            $fields['author']
        );
        $fields['email'] = str_replace(
            '<input id="email" name="email" type="text"',
            /* We use a proper type attribute to make use of the browser’s
             * validation, and to get the matching keyboard on smartphones.
             */
            '<input type="email" placeholder="contact@example.com"  id="email" name="email"',
            $fields['email']
        );
        $fields['url'] = str_replace(
            '<input id="url" name="url" type="text"',
            // Again: a better 'type' attribute value.
            '<input placeholder="http://example.com" id="url" name="url" type="url"',
            $fields['url']
        );

        return $fields;
    }

    public static function customizeCommentField($comment_field)
    {

      $comment_field =
        '<p class="comment-form-comment">
                <label for="comment">' . __( "Comment", "wood" ) . '</label>
                <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter comment here...", "wood" ) . '" cols="45" rows="8" aria-required="true"></textarea>
            </p>';

      return $comment_field;

    }
}
