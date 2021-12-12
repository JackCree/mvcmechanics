<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \MVC\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \MVC\Blog\Model\PostManager();
    $commentManager = new \MVC\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \MVC\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function editComment($commentId){
    //Get the comment to modify
    $commentManager = new \MVC\Blog\Model\CommentManager();

    $comment = $commentManager->getComment($commentId);

    //If the form has been correctly fulfilled, then we edit the comment then we move on the post
    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
		$commentManager->editComment($commentId, $_POST['author'], $_POST['comment']);

        header('Location: index.php?action=post&id='. $comment['post_id']);
    }
    //Or we print the form fullfilled with previous data
    require('view/frontend/editComment.php');
}