<?php

require_once('model/Manager.php');

class CommentManager extends Manager{
	
	public function listComments($postid)
	{
		$bdd = $this-> dbConnect();
		$ReqComment = $bdd->prepare('SELECT author, comment, date_comment, DAY(date_comment) AS jour, MONTH(date_comment) AS mois, YEAR(date_comment) AS annee, HOUR(date_comment) AS heure, MINUTE(date_comment) AS minute, SECOND(date_comment) AS seconde FROM comments WHERE post_id=? ORDER BY ID DESC');
		$ReqComment->execute(array($postid));

		return $ReqComment;
	}	

	public function postComment($postId, $author, $comment)
	{
	    $bdd = $this-> dbConnect();
	    $comments = $bdd->prepare('INSERT INTO comments(post_id, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
	    $insert = $comments->execute(array($postId, $author, $comment));

	    return $insert;
	}

	public function nbComment()
		{

			$bdd = $this->dbConnect();
			$nbrcomment = $bdd->prepare('SELECT COUNT(post_id) as nbrmsg FROM comments WHERE post_id=?');
			$nbrcomment->execute(array($_GET['id']));
			$ncomment = $nbrcomment->fetch();

			return $ncomment;
		}

	/*private function dbConnect()
	{
	    try
	    {
	        $bdd = new PDO('mysql:host=localhost;dbname=TpBlog2;charset=utf8', 'root', '');
	        return $bdd;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}*/

}

?>