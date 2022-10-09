<?php


namespace Domain\Blog\UseCase;

use Domain\Blog\Entities\Post;
use Domain\Blog\Port\PostRepositoryInterface;

class CreatePost {

    protected PostRepositoryInterface $postRepository;   



    public function __construct(PostRepositoryInterface $repository)
    {
        $this->postRepository = $repository;
        
    }
    public  function execute(array $postData) : ?post {
        $post =new Post($postData['title'], $postData['contenu'], $postData['uuid'], $postData['publishedAt']);

        $this->postRepository->save($post); 

        return $post;
    }


}