<?php

namespace Domain\Blog\Test\Adapters;

use Domain\Blog\Entities\Post;
use Domain\Blog\Port\PostRepositoryInterface;

class InMemoryPostRepository implements PostRepositoryInterface{

    public array $posts = [];

    public function save(Post $post) : post {
        $this->posts[$post->uuid] = $post;
        return $post;
    }

    public function findOne(string $uuid): ?post {
        return $this->posts[$uuid] ?? null;
    }
} 