<!DOCTYPE html>
<html>
<head>

	<?php $title ='TP Blog  - Affichage page billets'; ?>
</head>
	<body>
	<?php ob_start(); ?>
	<section class="container">
		<h2> TP OPC : Concevez votre site web avec PHP et Mysql </h2><br/ ><br/ >
			<p>Retrouvez ci dessous tous les sujets</p>

			<?php
				while ($affbillets = $posts->fetch())
				{				
			?>
				<table class="table table-borderless table-sm">
						<thead  class="thead-dark">
						<tr><th><?php 
									echo htmlspecialchars($affbillets['title']) . ' le ' . $affbillets['jour'] . '/' . $affbillets['mois'] . '/' . $affbillets['annee'] . ' à ' . $affbillets['heure'] . 'h' . $affbillets['minute'] . 'min' . $affbillets['seconde'] . 's'; 
								?></th></tr></thead>
						<tr><td class="table-secondary">
							<?php 
								echo htmlspecialchars($affbillets['content']); 
							?></td></tr>
						<tr><td class="table-secondary">
							<?php 
								echo '<a href="index.php?action=post&amp;id='.$affbillets['id'].'">';
							?>commentaires</a>							
						</td></tr>
				</table><br/>
			<?php
			}
				
				$posts->closeCursor();
			?>
			</section>

	<?php $content = ob_get_clean(); ?>

	<?php require('template.php'); ?>
	</body>
</html>