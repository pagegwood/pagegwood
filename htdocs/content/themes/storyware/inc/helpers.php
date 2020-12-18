<?php

function sw_list_post_category_links($post, $linkClass, $separator)
{
    // dd($post);
    if (isset($post) && $post->hasCategories()) {
        $output = '';

        foreach ($post->categories as $key) {
            $output .= '<a class="' . $linkClass . '" href="' . $key->url . '" title="' .  $key->name . '">' . $key->name . '</a>' . $separator;
        }

        echo rtrim($output, $separator);
    }
}


function sw_list_post_categories($post, $separator)
{
    if (isset($post) && $post->hasCategories()) {
        $output = '';

        foreach ($post->categories as $key) {
            $output .= $key->name . $separator;
        }

        echo '<span class="tet">' . rtrim($output, $separator) . '</span>';
    }
}


function sw_list_post_tag_links($post)
{
    if (isset($post) && $post->hasTags()) {
        $output = '';

        foreach ($post->tags as $key) {
            $output .= '<li><a href="' . $key->url . '" title="' .  $key->name . '">' . $key->name . '</a></li>';
        }

        echo $output;
    }
}

function sw_hide_from_search()
{
    Filter::add("wpseo_robots", function () {
        return "noindex,follow";
    });
}

function sw_get_menu_by_location($location)
{

    if (empty($location)) {

        return false;
    }

    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {

        return false;
    }

    $menuId = $locations[$location];

    $menu = wp_get_nav_menu_object($menuId);

    return $menu;
}

function sw_search_count($return = false){
    global $wp_query;

      if($return == true )return $wp_query->found_posts;
      else echo $wp_query->found_posts;
   }
