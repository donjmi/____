<!DOCTYPE html>
<html>
<head>

	<?php $title ='TP Blog - page commentaire'; ?>

</head>
<body>
	<?php ob_start(); ?>
	<section class="container">
		<header>
			<p><h1>Mon Blog !!</h1></p>
			<br/ >
			<a href="index.php">Retour à la liste des billets</a>
		</header>
			<!-- affichage du sujet à commenter -->

		<h3>Commentaires !!!</h3>
		<br/ >
			<section class="row">
			
					<form class="form-group" action="index.php?action=addComment&amp;id=<?= $data['id'] ?>"  method="POST">
						<p><label>Auteur : </label><input class="form-control" type="text" name="author" value="<?= $data['author'] ?>" required></p>
						<p><label>Votre commentaire : </label><input class="form-control" type="text" name="comment" value="<?= $data['comment'] ?>" required></p>
						
						<p><button type="submit" name="submit_msg" class="btn btn-primary">Envoyer</button></p>
					</form>
				<br/ >
	</section>

	<?php $content = ob_get_clean(); ?>
	<?php require('template.php'); ?>
</body>
</html>