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
			//$post->closeCursor();
			//$Reqcomment->closeCursor();
			?>

		</section>
		<br\ >
		
		</div>
	</section>

	<?php $content = ob_get_clean(); ?>
	<?php require('template.php'); ?>
</body>
</html>