<?php
require('model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = viewPost($_GET['id']);
    $ncomment = nbComment($_GET['id']);
    $ReqComment = listComments($_GET['id']);
    require('postView.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

