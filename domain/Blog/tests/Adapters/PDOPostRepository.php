<?php 

namespace Domain\Blog\Test\Adapters;

use Domain\Blog\Entities\Post;
use Domain\Blog\Port\PostRepositoryInterface;
use PDO;

class PDOPostRepository implements PostRepositoryInterface {

    protected PDO $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql :host=localhost; dbname= hexagonal_blogtuto', 
        'root', '' );

    }
    

   public function save(Post $post) {
    $query = $this->pdo->prepare(
        'INSERT INTO posts SET

        title = :title,
        contenu = :contenu,
        uuid = :uuid,
        publishedAt = :publishedAt
        '
    );

    $query->execute([
        'title' => $post->title,
        'contenu' => $post->contenu,
        'uuid' => $post->uuid,
        'publishedAt' => $post->publishedAt ?
        $post->publishedAt->format("y-m-d H:i:s") :
            null

        ]);

   }

   public function findOne(string $uuid): ?Post
   {
     $query = $this->pdo->prepare('
     SELECT p.* FROM posts AS p  WHERE p.uuid = :uuid '

   );
   $query->execute([
    'uuid' => $uuid
   ]);

   $result = $query->fetch(PDO::FETCH_ASSOC);

   if(!$result) {
    return null;
   }

   $post = new Post($result['title'], $result['contenu'], $result['uuid'], $result['publishedAt'] );

   return $post;
    
   }
}

