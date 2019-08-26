<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
   
   	$PostManager = new  PostManager();
	$posts = $PostManager->getBillets();

	require('view/frontend/listPostsView.php');
}

function post()
{

	$PostManager = new  PostManager();
	$CommentManager = new CommentManager();


	$post = $PostManager->viewPost($_GET['id']);
  	$ncomment = $CommentManager->nbComment($_GET['id']);
	$ReqComment = $CommentManager->listComments($_GET['id']);
	   
    require('view/frontend/postView.php');
}


function addComment($postId, $author, $comment)
{
   
	$CommentManager = new CommentManager();
    $insert = $CommentManager->postComment($postId, $author, $comment);

    if ($insert === false) 
    {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}