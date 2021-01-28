<?php

namespace App\Content\Blocks;

use Illuminate\Support\Collection;

use App\PostType\Project;

class PlankProjects extends BlockBuilder
{
    public $view = 'blocks.projects';

    public $count = 4;

    public function getPostCount()
    {
        if (is_numeric($this->max_total)) {

            $this->count = $this->max_total;
        }

        return $this;
    }

    public function getPostsAttribute()
    {
        $this->getPostCount();

        if (!empty($this->tag) && $this->limit_by_tag === true) {
          //limit by tag
            $tag = (int)$this->tag;

            return Project::query()->tag($tag)->limit((int)$this->count)->get();
        }

        elseif(!empty($this->projects_array)){

            $ids = array_pluck($this->projects_array, 'ID');

            $posts = Project::query()->order('post__in')->findAll($ids);

            return $posts;
        }

        else{

            return Project::query()->limit($this->count)->get();
        }
    }

    public function hasPosts()
    {
        return !is_null($this->posts);
    }

    public function getTotalPostsAttribute()
    {
        if ($this->hasPosts()) return $this->posts->count();
    }
}
