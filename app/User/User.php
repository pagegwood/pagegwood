<?php

namespace App\User;

use WPFluent\PostType\Image;
use WPFluent\Support\Filter;
use WPFluent\User\Base as BaseUser;

use App\PostType\Post;

class User extends BaseUser
{
    public function getUrlAttribute()
    {
        return $this->posts_url;
    }
}
