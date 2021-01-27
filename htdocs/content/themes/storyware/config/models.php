<?php

return [

    'options' => [
        App\Option\Site::class,
    ],

    'roles' => [],

    'users' => [
    ],

    'taxonomies' => [
        App\Taxonomy\ProjectTag::class,
    ],

    'posttypes' => [
        App\PostType\Gallery::class,
        App\PostType\Page::class,
        App\PostType\Post::class,
        App\PostType\PostsPage::class,
        App\PostType\Project::class,
    ],

    'other' => [],
];
