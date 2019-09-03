<?php

	
	$bdd = new PDO('mysql:host=localhost;dbname=TpBlog2;charset=utf8', 'root', '');
	$id= $_GET['id'];
	
	$Commentaire = $bdd->prepare('SELECT id, author, comment FROM comments WHERE id=?');
	$Commentaire->execute(array($id));

	$data = $Commentaire->fetch()
		
?>

		<form action="" method="POST">
			<input type ="text" name="author" value="<?php echo $data['author']; ?>">
			<input type ="text" name="comment" value="<?php echo $data['comment']; ?>">
			<input type="submit" name="modifier">
		
		
		</form>

