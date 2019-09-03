<?php
	namespace opc2\model;
	require_once('model/Manager.php');

	class EditManager extends Manager
	{

		public function EditComments($postId)
			{
			    $bdd = $this-> dbConnect();
			    $req = $bdd->prepare('UPDATE comments SET comment WHERE post_id=?');
			    $result = $req->execute(array($postId));
		
			    return $result;
			}

	}

?>