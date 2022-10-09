<?php

namespace Domain\Blog\Port;

use Domain\Blog\Entities\Post;

interface PostRepositoryInterface {
    public function save(post $post);
    public function findOne(string $uuid): ?post;
}