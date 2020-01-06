<?php
// namespace Blog\Controllers;


class PostsController extends MainController
{

    public function index()
    {
        // $Post = new PostsModel();
        $this->loadModel("Posts");
         echo 'fichier src/controllers/PostsController  avec la fonction index';
    }
}
