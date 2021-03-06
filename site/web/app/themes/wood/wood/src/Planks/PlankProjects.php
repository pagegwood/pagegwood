<?php

namespace Wood\Planks;

use Wood\Planks\PlankBase;
use Wood\PostTypes\Project;

use Illuminate\Support\Collection;

class PlankProjects extends PlankBase
{

	public $view = 'planks/projects.twig';

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


    if (!empty($this->tag) && $this->limit_by_tag === true){
      //limit by tag
      $tag = (int)$this->tag;

      $args = array(
  			'tag__in' => $tag,
  			'posts_per_page' => $this->count
      );

      return $this->posts = Project::query($args);
    }

    elseif(!empty($this->projects_array)){

      $ids = array_pluck($this->projects_array, 'ID');

      $args = array(
        'post__in' =>  $ids,
        'posts_per_page' => $this->count
      );

      $this->posts = Project::query($args);

      $this->posts = collect($this->posts);

      $this->posts = $this->posts->sort(function ($a, $b) use($ids) {

          return array_search($a->ID, $ids) - array_search($b->ID, $ids);
      });

      return $this->posts;
    }

    else{
      /// get all
      $args = array(
        'posts_per_page' => $this->count
  		);

      return $this->posts = Project::query($args);
    }
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
