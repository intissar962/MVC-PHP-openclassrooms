<?php
namespace Application\Controllers\Comment\Update;

require_once('src/model/comment.php');
require_once('src/lib/database.php');

use Application\Model\Comment\CommentRepository;
use Application\Lib\database\DatabaseConnection;

class UpdateComment 
{
    function execute(string $id, ?array $input)
    {
        if($input !== null)
        {
            $author = null;
            $comment = null;
            if (!empty($input['author']) && !empty($input['comment'])) {
                $author = $input['author'];
                $comment = $input['comment'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($id, $author, $comment);
            if (!$success) {
            
                throw new \Exception('Impossible d\'ajouter le commentaire !');
            } else {
                
                header('Location: index.php?action=post&id=' . $id);
            }
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($id);
        if($comment == null)
        {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }
        require('templates/updateComment.php');
        
        
    }
}