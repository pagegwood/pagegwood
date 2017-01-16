<?php

namespace Wood\Config;

class CustomTaxonomies
{
    public static function register()
    {
        add_action('init', [get_called_class(), 'taxonomies']);
    }

    public static function taxonomies()
    {
		  $labels = array(
		    'name' => _x( 'Tags', 'taxonomy general name' ),
		    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
		    'search_items' =>  __( 'Search Tags' ),
		    'popular_items' => __( 'Popular Tags' ),
		    'all_items' => __( 'All Tags' ),
		    'parent_item' => null,
		    'parent_item_colon' => null,
		    'edit_item' => __( 'Edit Tag' ),
		    'update_item' => __( 'Update Tag' ),
		    'add_new_item' => __( 'Add New Tag' ),
		    'new_item_name' => __( 'New Tag Name' ),
		    'separate_items_with_commas' => __( 'Separate tags with commas' ),
		    'add_or_remove_items' => __( 'Add or remove tags' ),
		    'choose_from_most_used' => __( 'Choose from the most used tags' ),
		    'menu_name' => __( 'Tags' ),
		  );

		  register_taxonomy('wood_project_tag','wood_project', array(
		    'hierarchical' => false,
		    'labels' => $labels,
		    'show_ui' => true,
		    'update_count_callback' => '_update_post_term_count',
		    'query_var' => true,
		    'rewrite' => array( 'slug' => 'tag' ),
		  ));
    }
}
