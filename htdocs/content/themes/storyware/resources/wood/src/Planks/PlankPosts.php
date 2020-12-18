<?php

namespace Wood\Planks;

use Wood\Planks\PlankBase;
use Wood\PostTypes\Post;

class PlankPosts extends PlankBase
{

	public $view = 'planks/posts.twig';

	public $count = 4;

  public function getPostCount()
  {
    if (is_numeric($this->max_total)) {

      $this->count = $this->max_total;
    }

    return $this;
  }

  public function posts ()
  {
    $this->getPostCount();


    if (!empty($this->category) && $this->limit_by_category === true && $this->limit_by_tag === false){
      //category

      $category = (int)$this->category;

      $args = array(
  			'category__in' => $category,
  			'posts_per_page' => $this->count
      );
    }

    elseif (!empty($this->tag) && $this->limit_by_tag === true && !empty($this->category) && $this->limit_by_category === true){
      //both
      $tag = (int)$this->tag;

      $category = (int)$this->category;

      $args = array(
  			'category__and' => $category,
  			'tag__in' => $tag,
  			'posts_per_page' => $this->count
      );
    }

    elseif (!empty($this->tag) && $this->limit_by_tag === true && $this->limit_by_category == false){
      //tag

      $tag = (int)$this->tag;

      $args = array(
        'tag__in' => $tag,
        'posts_per_page' => $this->count
      );
  	}

    else{
      /// get all
      $args = array(
        'posts_per_page' => $this->count
  		);
    }

    return $this->posts = Post::query($args);
  }

  public function hasPosts()
  {
    return !is_null($this->posts);
  }

  public function totalPosts ()
  {
    if ($this->hasPosts()) return $this->total_posts = $this->posts->count();
  }

}
