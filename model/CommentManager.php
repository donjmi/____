<?php
namespace opc2\model;
require_once('model/Manager.php');


class CommentManager extends Manager
{
	//affichage liste des commentaires
	public function listComments($postid)
	{
		$bdd = $this-> dbConnect();
		$ReqComment = $bdd->prepare('SELECT id, post_id, author, comment, date_comment, DAY(date_comment) AS jour, MONTH(date_comment) AS mois, YEAR(date_comment) AS annee, HOUR(date_comment) AS heure, MINUTE(date_comment) AS minute, SECOND(date_comment) AS seconde FROM comments WHERE post_id=? ORDER BY ID DESC');
		$ReqComment->execute(array($postid));

		return $ReqComment;
	}	
	//insertion commentaires
	public function postComment($postId, $author, $comment)
	{
	    $bdd = $this-> dbConnect();
	    $comments = $bdd->prepare('INSERT INTO comments(post_id, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
	    $insert = $comments->execute(array($postId, $author, $comment));

	    return $insert;
	}
	// comptage nbr de commentaires
	public function nbComment()
		{

			$bdd = $this->dbConnect();
			$nbrcomment = $bdd->prepare('SELECT COUNT(post_id) as nbrmsg FROM comments WHERE post_id=?');
			$nbrcomment->execute(array($_GET['id']));
			$ncomment = $nbrcomment->fetch();

			return $ncomment;
		}
	// commentaire à modifier du formulaire
	public function modifComment($id)
		{
			$bdd = $this->dbConnect();

			$modif_form = $bdd->prepare('SELECT id, author, comment FROM comments WHERE id=?');
			$modif_form->execute(array($id));

			//$data = $modif_form->fetch()

			return $modif_form->fetch();

		}

		// modification du commentaire
	public function updateComment($id, $comment)
		{
			$bdd = $this->dbConnect();

			/*$id= $_GET['id'];
			$comment=$_POST['comment'];*/
	
			$update = $bdd->prepare('UPDATE comments SET comment=? WHERE id=? ');
			$update->execute(array($comment,$id));
	
		
			header('location: affichage.php');

		}
}

?>