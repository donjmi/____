<?php
require('controller/frontend.php');

if (isset($_GET['action'])) 
{
    if ($_GET['action'] == 'listPosts') 
        {
            listPosts();    
        }//fin
	elseif ($_GET['action'] == 'post') 
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) 
			{   post(); }
		else {
		echo 'Erreur : aucun identifiant de billet envoyé';
			}
	} 
	elseif ($_GET['action'] == 'addComment') 
	{
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			if (!empty($_POST['author']) && !empty($_POST['comment'])) {
				addComment($_GET['id'], $_POST['author'], $_POST['comment']);
			}
			else {
				echo 'Erreur : tous les champs ne sont pas remplis !';
			}
		}
		else {
			echo 'Erreur : aucun identifiant de billet envoyé';
		}
	}
	elseif ($_GET['action'] == 'editComment') {
		if (isset($_GET['id']) && $_GET['id'] > 0) 
			{   editComment($_GET['id']); }
		else {
		echo 'Erreur : formulaire modification';
			}
	}

}
else 
{
    listPosts();
}