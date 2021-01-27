<?php

namespace App\Taxonomy;

use WPFluent\Taxonomy\Base as BaseTaxonomy;
use Themosis\Support\Facades\Action;
use Themosis\Support\Facades\Filter;
use Themosis\Support\Facades\Taxonomy;

class ProjectTag extends BaseTaxonomy
{
    public $taxonomy = 'wood_project_tag';

    public static function registerTaxonomy()
    {
        Taxonomy::make('wood_project_tag', [], 'Categories', 'Category')->setArguments([
            'hierarchical' => false,
            'show_tagcloud' => false,
            'show_in_nav_menus' => false,
            'rewrite' => [
                'slug' => 'projects/tag',
                'with_front' => false
            ]
        ])->set();
    }
}
