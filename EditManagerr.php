<?php
	$bdd = new PDO('mysql:host=localhost;dbname=TpBlog2;charset=utf8', 'root', '');
	$id= $_GET['id'];
	$comment=$_POST['comment'];
	
	$update = $bdd->prepare('UPDATE comments SET comment=? WHERE id=? ');
	$update->execute(array($comment,$id));
	
		
	header('location: affichage.php');
	
?>