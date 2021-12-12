<?php
    //Load the controller file
    require('controller/frontend.php');
    
    //Test the parameter action : if not existing, load the previous last posts
    // If action exist, redirect to the good controller
    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listPosts') {
                listPost();
            } elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                } else {
                   //Error : we stop everything, send an exception, so we just to the catch
                   throw new Exception('Aucun identifiant de billet envoyé');
                } 
            } elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    } else {
                        //Exception
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    //Exception
                    throw new Exception('Aucun identifiant de billet envoyé');
                } 
            } elseif ($_GET['action'] == 'editComment') { //add the route for editing a comment
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    editComment($_GET['id']);
                } else {
                    throw new Exception("Aucun identifiant de commentaire envoyé");
                }
            }
        } else {
            listPosts();
        }
    } catch (Exception $e) {
        //if there is an error, so...
        $errorMessage = $e->getMessage();
        require('view/frontend/errorView.php');
    }

    //Credits to Ben-69 for the help
    //Link: https://github.com/BEN-69/Blog_MVC/blob/master/view/frontend/editView.php


