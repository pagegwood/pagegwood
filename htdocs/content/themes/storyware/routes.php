<?php

/**
 * Theme routes.
 *
 * The routes defined inside your theme override any similar routes
 * defined on the application global scope.
 */


View::share([
    'site' => Site::make(),
    'theme' => app('wp.theme'),
    'env' => Config::get('app.env')
]);

Route::any('page', function ($post) {

    $page = Page::make($post);

    return View::make('page', compact('page'));
});


Route::get('singular', ['wood_project', function ($post, $query) {

    $post = Project::make($post);

    return View::make('single-project', compact('post'));
}]);


Route::any('single', function ($post) {

    $post = Post::make($post);

    return View::make('single-post', compact('post'));
});


Route::get('home', ['uses' => 'PostController@showArchive']);

Route::get('archive', ['uses' => 'PostController@showArchive']);


Route::get('404', function () {

    return View::make('404');
});
