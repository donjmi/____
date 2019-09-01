<?php 
namespace opc2\model;
require_once('model/Manager.php');

class PostManager extends Manager
{

	public function getBillets()
	{
		$bdd = $this-> dbConnect();

		$posts = $bdd->query('SELECT id, title, content, date_creation, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde 
							FROM posts 
							ORDER BY ID 
							DESC LIMIT 5');
		return $posts;
	}


	public function viewPost($postid)
	{
	$bdd = $this->dbConnect();

	$req2 = $bdd->prepare('SELECT id, title, content, date_creation, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS annee, HOUR(date_creation) AS heure, MINUTE(date_creation) AS minute, SECOND(date_creation) AS seconde 
							FROM posts  
							WHERE id=?');
	$req2->execute(array($postid));

	$post = $req2->fetch();

	return $post;
	}

}

?>