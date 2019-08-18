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
    $insert = addPosts();
    $ReqComment = listComments($_GET['id']);
    
    require('view/frontend/postView.php');
}