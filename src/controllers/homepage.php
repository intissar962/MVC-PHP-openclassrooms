<?php

namespace Application\Controllers\HomePage;

require_once('src/model/post.php');
require_once('src/lib/database.php');

use Application\Model\Post\PostRepository;
use Application\Lib\database\DatabaseConnection;

class HomePage
{

    function execute()
    {
        $repository = new PostRepository();
        $repository->connection = new DatabaseConnection ;
        $posts = $repository->getPosts();
        
        require('templates/homepage.php');
    }

}

