<?php

namespace App\PostType;

use WPFluent\PostType\Base as BaseType;
use WPFluent\PostType\Traits\Excerpt;

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;
use Themosis\Support\Facades\PostType;

use WP_Query;

class Project extends BaseType
{

    public $post_type = 'wood_project';

    public function getCacheableAccessors()
    {
        return array_merge(parent::getCacheableAccessors(), [

        ]);
    }

    public static function registerPostType()
    {
        PostType::make(static::getPostType(), 'Projects', 'Project')->setArguments([
            'public' => true,
            'has_archive' => false,
            'supports' => [
                'title',
                'author',
                'editor',
                'thumbnail'
            ],
            'rewrite' => [
                'slug' => 'projects',
            ],
            'show_in_nav_menus' => true,
        ])->set();
    }

    public static function registerDocumentHooks($class)
    {
        Action::add('admin_menu', [$class, 'removeMetaBox']);
    }

    public function newQuery()
    {
        return parent::newQuery()->orderBy('menu_order', 'ASC');
    }

    public static function removeMetaBox()
    {
        remove_meta_box('tagsdiv-wood_project_type', static::getPostType(), 'side');
        remove_meta_box('tagsdiv-wood_project_category', static::getPostType(), 'side');
        remove_meta_box('tagsdiv-wood_project_location', static::getPostType(), 'side');
        remove_meta_box('tagsdiv-wood_project_year', static::getPostType(), 'side');
    }


    public function getTagsAttribute()
  {
    if (!$this->tags) {

      $tags = $this->get_terms('wood_project_tag');

      if (is_array($tags) && count($tags)) {
          $this->tags = $tags;
      }
    }
    return $this->tags;
  }

  public function getPreviewImageAttribute()
  {
    $id = get_field('wood_preview_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function getDesktopFeaturedImageAttribute()
  {
    $id = get_field('wood_featured_image_desktop_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }

  public function getMobileFeaturedImageAttribute()
  {
    $id = get_field('wood_featured_image_mobile_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }


  public function getLogoImageAttribute()
  {
    $id = get_field('wood_logo_image_id', $this->ID);

    if (is_int($id)) {
        return new TimberImage($id);
    }
  }


  public function getWebsiteUrlAttribute()
  {
    $text = get_field('wood_project_url', $this->ID);

    if (!empty($text)) {
        return $text;
    }
  }

  public function getLaunchDateAttribute()
  {
    $text = get_field('wood_project_launch_date', $this->ID);

    if (!empty($text)) {
      return $text;
    }
  }
}
