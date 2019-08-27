<?php

require('model/frontend.php');

function listPosts()
{
   
	$posts = getBillets();

	require('view/frontend/listPostsView.php');
}

function post()
{
    $post = viewPost($_GET['id']);
    $ncomment = nbComment($_GET['id']);
    //$insert = addPosts();
    $ReqComment = listComments($_GET['id']);
    
    require('view/frontend/postView.php');
}

/*
function addComment()
{

	$insert = addPosts($postId, $author, $comment);

if ($insert === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}*/


function addComment($postId, $author, $comment)
{
    $insert = postComment($postId, $author, $comment);

    if ($insert === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}