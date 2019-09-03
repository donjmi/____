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
		<section class="row">

			<table class="table table-borderless table-sm">
					<thead  class="thead-dark">
						<tr><th><?php echo htmlspecialchars($post['title']) . ' le ' . $post['jour'] . '/' . $post['mois'] . '/' . $post['annee'] . ' à ' . $post['heure'] . 'h' . $post['minute'] . 'min' . $post['seconde'] . 's' ; ?>
						<?php
						{
							echo '(' . htmlspecialchars($ncomment['nbrmsg']) .' commentaire(s))';
						}
					?>

			</th></tr>
					</thead>			
						<tr><td class="table-secondary"><?php echo htmlspecialchars($post['content']); ?></td></tr>
			</table><br/>

		</section>
		<br\ >
		<h3>Commentaires !!!</h3>
		<br/ >
			<section class="row">
					<form class="form-group" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>"  method="POST">
						<p><label>Auteur : </label><input class="form-control" type="text" name="author" required></p>
						<p><label>Votre commentaire : </label><input class="form-control" type="text" name="comment" required></p>
					
						<p><button type="submit" name="submit_msg" class="btn btn-primary">Envoyer</button></p>
					</form>
				<br/ >
				<div class="row">
					<?php 				

					while ($comments = $ReqComment->fetch())	
			
					{					

					?>	
					<table class="table table-borderless table-sm">
						<thead  class="thead-light">
							<!-- format date comment -->
							<?php 
							$datecom = $comments['jour'] . '/' . $comments['mois'] . '/' . $comments['annee'] . ' à ' . $comments['heure'] . 'h' . $comments['minute'] . 'min' . $comments['seconde'] . 's';
							?>
							<tr>
								<th><?php echo '-'.htmlspecialchars($comments['author']) . ' le ' . $datecom; ?></th>
							</tr>
						</thead>
							<tr>
								<td ><?php echo htmlspecialchars($comments['comment']); ?>

								<a href="index.php?id=<?= $comments['id'] ?>&action=editComment"> (modifier)</a></td>
							</tr>
					</table><br/>
					<?php
					}
					?>

				</div>		

	</section>

	<?php $content = ob_get_clean(); ?>
	<?php require('template.php'); ?>
</body>
</html>