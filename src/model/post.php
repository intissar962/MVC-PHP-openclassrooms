<?php

namespace Application\Model\Post;

require_once('src/lib/database.php');

use Application\Lib\database\DatabaseConnection;

class Post
{
	public string $title;
	public string $french_creation_date;
	public string $content;
	public string $id;
}

class PostRepository
{
	public DatabaseConnection $connection;

    public function getPost( string $id): Post {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$id]);
    
        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title'];
        $post->french_creation_date = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->id = $row['id'];
    
        return $post;
    }


    public function getPosts(): array {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new Post();
            $post->title = $row['title'];
            $post->french_creation_date = $row['french_creation_date'];
            $post->content = $row['content'];
            $post->id = $row['id'];
    
            $posts[] = $post;
        }
    
        return $posts;
    }


 

}





