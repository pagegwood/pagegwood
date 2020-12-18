<?php

return [

    'options' => [
        App\Option\Site::class,
    ],

    'roles' => [],

    'users' => [
    ],

    'taxonomies' => [
    ],

    'posttypes' => [
        App\PostType\Page::class,
        App\PostType\Post::class,
        App\PostType\PostsPage::class,
    ],

    'other' => [],
];
