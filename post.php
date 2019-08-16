<?php
require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = viewPost($_GET['id']);
    $Reqcomment = listComments($_GET['id']);
    $comment = nbComment($_GET['id']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

