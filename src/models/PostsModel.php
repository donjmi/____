<?php
class PostsModel extends MainModel{

public function __construct()
{
    // Nous définissons la table par défaut de ce modèle
    $this->table = "posts";

    // Nous ouvrons la connexion à la base de données
    $this->getConnection();
}
}