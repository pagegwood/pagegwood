<?php

namespace App\PostType;

use WPFluent\PostType\Base as BaseType;
use WPFluent\PostType\Image;

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;
use Themosis\Support\Facades\PostType;

use Illuminate\Support\Collection;

use WP_Query;

class Gallery extends BaseType
{

    public $post_type = 'wood_gallery';

    public function getCacheableAccessors()
    {
        return array_merge(parent::getCacheableAccessors(), [

        ]);
    }

    public static function registerPostType()
    {
        PostType::make(static::getPostType(), 'Galleries', 'Gallery')->setArguments([
            'public' => true,
            'has_archive' => false,
            'supports' => [
                'title',
                'author',
                'editor',
                'thumbnail'
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
        //remove_meta_box('tagsdiv-wood_project_type', static::getPostType(), 'side');
    }

    public function getImagesAttribute() {

        $images = get_field('wood_gallery', $this->ID);

        if (is_array($images)) {

            foreach ($images as &$image) {

                $image = Image::query()->find((int)$image['id']);

            }
        }

        return Collection::make($images);
    }
}
