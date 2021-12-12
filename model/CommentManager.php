<?php

namespace MVC\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    //Method to get the specific comment 
    public function getComment($commentId){
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $request->execute(array($commentId));
        $comment = $request->fetch();
        $request->closeCursor();

        return $comment;
    }
    //Method to edit the comment 
    public function editComment($commentId, $author, $comment){
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE comments SET author = :author, comment = :comment, comment_date = NOW() WHERE id = :id');
        $request->execute(array('author' => $author, 'comment' => $comment, 'id' => $commentId));

        return $request;
    }
}