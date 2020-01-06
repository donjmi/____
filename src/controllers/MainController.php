<?php

abstract class MainController
{
    /**
     * Permet de charger un modèle
     * @param string $model
     * @return void
     */
    public function loadModel(string $model)
    {
        // On va chercher le fichier correspondant au modèle souhaité
        require_once('./../src/models/' . $model . 'Model.php');

        // On crée une instance de ce modèle. Ainsi "Posts" sera accessible par $this->Posts
            $model = $model.'Model';
            $this->$model = new $model();  
    }
}
