<?php
$bdd = new PDO('mysql:host=localhost;dbname=TpBlog2;charset=utf8', 'root', '');
	$ReqComment = $bdd->query('SELECT id, post_id, author, comment, date_comment, DAY(date_comment) AS jour, MONTH(date_comment) AS mois, YEAR(date_comment) AS annee, HOUR(date_comment) AS heure, MINUTE(date_comment) AS minute, SECOND(date_comment) AS seconde FROM comments ORDER BY ID DESC');
		//$ReqComment->execute(array());
		
		while($comments = $ReqComment->fetch())
		{
			
			echo ($comments['id']). ' - '.($comments['author']). ' : '.$comments['comment']. '<a href="modif.php?id='.$comments['id'].'"> (modifier)</a><p>' ;
								
			
		}
?>