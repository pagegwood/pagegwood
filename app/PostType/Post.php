<?php

namespace App\PostType;

use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;

use WPFluent\PostType\Post as BasePost;
use WPFluent\PostType\Traits\Content;
use WPFluent\PostType\Traits\Excerpt;
use WPFluent\PostType\Traits\Categories;
use WPFluent\PostType\Traits\Tags;

use App\User\User;

use App\PostType\Traits\FeaturedImage;
use App\PostType\Traits\PreviewImage;

class Post extends BasePost
{
    use Content,
        Excerpt,
        Categories,
        FeaturedImage,
        PreviewImage,
        Tags;

    public static function registerPostHooks($class)
    {
        Action::add('init', [$class, 'removePostTypeSupport']);

        Filter::add('get_the_archive_title', [$class, 'cleanArchiveTitle']);

        Filter::add('post_format_rewrite_rules', [$class, 'purgeDefaultRewriteRules']);
    }

    public function getAuthorAttribute()
    {
        return User::query()->find($this->post_author);
    }

    public function getCacheableAccessors()
    {
        return array_merge(parent::getCacheableAccessors(), [
            'author',
            'bibliography',
            'featured_image',
            'preview_image'
        ]);
    }

    public static function cleanArchiveTitle($title)
    {
        // Simply remove anything that looks like an archive title prefix ("Archive:", "Foo:", "Bar:").
        return preg_replace('/^\w+: /', '', $title);
    }

    public function getAuthorNameAttribute()
    {
        return get_the_author_meta('display_name', $this->post_author);
    }

    public function getDisplayDateAttribute()
    {
        return date('F d, Y',  strtotime($this->post_date));
    }

    public static function removePostTypeSupport()
    {
        remove_post_type_support('post', 'comments');
        remove_post_type_support('post', 'custom-fields');
        remove_post_type_support('post', 'post-formats');
        remove_post_type_support('post', 'thumbnail');
        remove_post_type_support('post', 'trackbacks');
    }

    public function getCommentsAttribute()
    {
        return get_comments([
            'post_id' => $this->ID
        ]);
    }


    public static function purgeDefaultRewriteRules(array $rules)
    {
        return [];
    }
}
