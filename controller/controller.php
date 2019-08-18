<?php

require('model/model.php');

function listPosts()
{
   
	$posts = getBillets();

	require('view/listPostsView.php');
}

function post()
{
    $post = viewPost($_GET['id']);
    $ncomment = nbComment($_GET['id']);
    $insert = addPosts();
    $ReqComment = listComments($_GET['id']);
    
    require('view/postView.php');
}