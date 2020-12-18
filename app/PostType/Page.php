<?php

namespace App\PostType;

use WPFluent\PostType\Page as BasePage;

use Themosis\Support\Facades\Action;
use Illuminate\Support\Facades\View;

use App\PostType\Traits\ContentBlocks;

class Page extends BasePage
{
    use ContentBlocks;

    protected $view = 'partials.stacked';

    public function getCacheableAccessors()
    {
        return array_merge(parent::getCacheableAccessors(), [
            'blocks',
            'logo_color'
        ]);
    }

    public function getPostContentAttribute($value)
    {
        $page = $this->suppressPostContentFilters(true);

        $value = View::make($this->view, compact('page'))->render();

        return parent::getPostContentAttribute($value);
    }

    public static function registerPageHooks($class)
    {
        Action::add('init', [$class, 'removePostTypeSupport']);
    }

    public static function removePostTypeSupport()
    {
        remove_post_type_support('page', 'comments');
        remove_post_type_support('page', 'custom-fields');
        remove_post_type_support('page', 'thumbnail');
        remove_post_type_support('page', 'trackbacks');
    }
}
