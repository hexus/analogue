<?php

namespace TestApp\Maps;

use TestApp\User;
use TestApp\Blog;
use TestApp\Article;
use TestApp\Identity;
use Analogue\ORM\EntityMap;

class UserMap extends EntityMap 
{
    public $timestamps = true;

    protected $embeddables = ['identity' => Identity::class];

    public function blog(User $user)
    {
        return $this->hasOne($user, Blog::class);
    }

    public function articles(User $user)
    {
        return $this->hasManyThrough($user, Article::class, Blog::class);
    }
}