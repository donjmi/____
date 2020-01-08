<?php

namespace Blog;

require_once '../config/functions.php';
require_once 'models/MainModel.php';
require_once 'controllers/MainController.php';


class Router
{
    public function run()
    {
        //echo "fonction routeRun";
        // On sépare les paramètres et on les met dans le tableau $params
        $params = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));

        // Si au moins 1 paramètre existe
        if ($params[0] != "") {
            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
            $controller = ucfirst(strtolower($params[0]));

            // On sauvegarde le 2ème paramètre dans $action s'il existe, sinon la méthode index()
            $action = isset($params[1]) ? $params[1] : 'index';

            // On appelle le contrôleur
            $ctrl = $controller . "Controller";
            require_once('controllers/' . $controller . '.php');

            // On instancie le contrôleur
            $controller = new $controller();

            // On appelle la méthode
            if (method_exists($controller, $action)) {
                /**
                 * unset : permet d'initialiser la variable $params
                 * @var string[]|false $params
                 */
                unset($params[0]);
                unset($params[1]);

                // appelle une fonction le controlleur et la méthode en ajoutant des paramètres
                call_user_func_array([$controller, $action], $params);
                // $controller->$action();
            } else {
                http_response_code(404);
                echo "La page recherchée n'existe pas";
            }

        } else {
            
            // Ici aucun paramètre n'est défini

        }//end if
    } //end function run
}//end class Router
