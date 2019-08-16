<?php
function getBillets()
{
	 $bdd = dbConnect();

	$posts = $bdd->query('SELECT id, title, content, date_creation, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde 
									FROM posts 
									ORDER BY ID 
									DESC LIMIT 5');
	return $posts;
}

// view post
function viewPost($postid)
{
	$bdd = dbConnect();

	$req2 = $bdd->prepare('SELECT id, title, content, date_creation, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde FROM posts  WHERE id=?');
	$req2->execute(array($postid));

	$post = $req2->fetch();

	return $post;
}

// comments number
function nbComment()
{

	$bdd = dbConnect();
	$nbrcomment = $bdd->prepare('SELECT COUNT(id_post) as nbrmsg FROM comments WHERE id_post=?');
	$nbrcomment->execute(array($_GET['id']));
	$comment = $nbrcomment->fetch();

	return $comment;
}

// view list comments
function listComments($postid)
{
	$bdd = dbConnect();
	$ReqComment = $bdd->prepare('SELECT author, comment, date_comment, DAY(date_comment) AS jour, MONTH(date_comment) AS mois, YEAR(date_comment) AS annee, HOUR(date_comment) AS heure, MINUTE(date_comment) AS minute, SECOND(date_comment) AS seconde FROM comments WHERE id_post=? ORDER BY ID DESC');
	$ReqComment->execute(array($postid));

	return $ReqComment;
}	


function dbConnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=TpBlog;charset=utf8', 'root', '');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
