<?php

abstract class MainController
{
    /**
     * Allows to load a model
     * @param string $model
     * @return void
     */
    public function loadModel(string $model)
    {
        // will look for the file corresponding to the desired model
        require_once('./../src/models/' . $model . 'Model.php');

        // create an instance of this model   => "Posts" acces to $this->Posts
        $model = $model . 'Model';
        $this->$model = new $model();
    }

    /**
     * 
     * extract() allows you to create a variable for each field
     */
    public function Render(string $file, array $data = [])
    {
        extract($data);

        require_once('./../src/views/' . $file . '.php');
    }
}
