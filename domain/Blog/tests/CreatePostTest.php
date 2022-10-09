<?php

use Domain\Blog\UseCase\CreatePost;
use Domain\Blog\Entities\Post;

use Domain\Blog\Test\Adapters\PDOPostRepository;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

it("sould create a psot", function(){

    $repository = new PDOPostRepository;


    $useCase = new CreatePost($repository);
    $post = $useCase->execute([
        'title' => 'mon titre',
        'contenu' => 'mon contenu',
        'uuid' => null,
        'publishedAt' => new DateTime()
    ]);

    assertInstanceOf(Post::class, $post);
    assertEquals($post, $repository->findOne($post->uuid));
});