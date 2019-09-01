<?php
namespace opc2\model;
class manager
{
	protected function dbConnect()
	{
	    try
	    {
	        $bdd = new \PDO('mysql:host=localhost;dbname=TpBlog2;charset=utf8', 'root', '');
	        return $bdd;
	    }
	    catch(Exception $e)
	    {
	        die('Erreur : '.$e->getMessage());
	    }
	}
}
?>