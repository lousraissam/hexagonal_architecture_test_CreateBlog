<?php

namespace Domain\Blog\Entities;

use DateTimeInterface;

class Post {
    public string $title;
    public string $contenu;
    public ?string $uuid;
    public ?DateTimeInterface $publishedAt;

    public function __construct(string $title = '', ?string $contenu = '', string $uuid = null, ?DateTimeInterface $publishedAt= null)
    {
        $this->title = $title;
        $this->contenu = $contenu;
        $this->uuid = $uuid ?? uniqid();
        $this-> publishedAt = $publishedAt;
       


    }


}