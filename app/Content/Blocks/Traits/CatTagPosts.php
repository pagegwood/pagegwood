<?php

namespace App\Content\Blocks\Traits;

use App\PostType\Post;

trait CatTagPosts
{
    public $count = 3;

    public function getPostCount()
    {

        if (is_numeric($this->post_limit)) {

            $this->count = $this->post_limit;
        }

        return $this;
    }

    public function getPostsAttribute ()
    {

        $this->getPostCount();

        if (!empty($this->post_category) && $this->limit_by_category === true && $this->limit_by_tags === false && $this->manually_select_posts === false){
            //category
            $category = (int)$this->post_category;

            return Post::query()->category($category)->limit((int)$this->count)->get();
        }

        elseif (!empty($this->post_tags_array) && $this->limit_by_tags === true && !empty($this->post_category) && $this->limit_by_category === true && $this->manually_select_posts === false){
            //tags and category
            $tags = implode(', ',$this->post_tags_array);

            $category = (int)$this->post_category;

            return Post::query()->category($category)->tags(array($tags), 'IN')->limit((int)$this->count)->get();
        }

        elseif (!empty($this->post_tags_array) && $this->limit_by_tags === true && $this->limit_by_category === false && $this->manually_select_posts === false){
            //tags

            $tags = implode(', ',$this->post_tags_array);

            return Post::query()->tags(array($tags), 'IN')->limit((int)$this->count)->get();
        }

        elseif (!empty($this->posts_array) && $this->manually_select_posts === true && $this->limit_by_category === false && $this->limit_by_tags === false){
            $ids = $this->posts_array;

            if (is_array($ids) && count($ids) > 0) {

                return Post::query()->orderBy('post__in')->findAll($ids);
            }
        }

        else{

            return Post::query()->limit((int)$this->count)->get();
        }
    }

    public function hasPosts()
    {
        return !is_null($this->posts);
    }

    public function totalPosts ()
    {
        if ($this->hasPosts()) return $this->posts->count();
    }

}
