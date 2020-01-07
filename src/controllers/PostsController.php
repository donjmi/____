<?php
// namespace Blog\Controllers;


class PostsController extends MainController
{

    public function index()
    {
        /**
         * load the model and his function
         */
        $this->loadModel("Posts");

        $articles = $this->PostsModel->getAll();
        /**
         * page display 'index' 
         * @var mixed $articles 
         * posts use to view in index file
         */
        $this->Render('index', ['posts' => $articles]);
        
    }
}
