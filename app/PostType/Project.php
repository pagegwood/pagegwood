<?php

namespace App\PostType;

use WPFluent\PostType\Base as BaseType;
use WPFluent\PostType\Traits\Excerpt;
use WPFluent\PostType\Image;
use WPFluent\PostType\Traits\Permalink;

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;
use Themosis\Support\Facades\PostType;

use App\PostType\Traits\PreviewImage;
use App\PostType\Traits\FeaturedImage;
use App\PostType\Traits\ProjectTags;

use WP_Query;

class Project extends BaseType
{
    use Permalink,
        PreviewImage,
        ProjectTags,
        FeaturedImage;

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
            'taxonomies' => ['wood_project_tag']
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
        //remove_meta_box('tagsdiv-wood_project_type', static::getPostType(), 'side');
    }

    public function getDesktopFeaturedImageAttribute()
    {
        $id = get_field('wood_featured_image_desktop_id', $this->ID);

        if (is_int($id)) {
            return Image::query()->find((int)$id);
        }
    }


    public function hasDesktopFeaturedImage()
    {
        if (!empty($this->desktop_featured_image)) return true;
    }

    public function hasMobileFeaturedImage()
    {
        if (!empty($this->mobile_featured_image)) return true;
    }

    public function getMobileFeaturedImageAttribute()
    {
        $id = get_field('wood_featured_image_mobile_id', $this->ID);

        if (is_int($id)) {
            return Image::query()->find((int)$id);
        }
    }


    public function getLogoImageAttribute()
    {
        $id = get_field('wood_logo_image_id', $this->ID);

        if (is_int($id)) {
            return Image::query()->find((int)$id);
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
