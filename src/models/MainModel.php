<?php

abstract class MainModel{
    // Informations de la base de données
    private $host       = "localhost";
    private $db_name    = "tpblog2";
    private $username   = "root";
    private $password   = "";

    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
        // On supprime la connexion précédente
        $this->_connexion = null;

        // On essaie de se connecter à la base
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }   

    public function getAll(){
        $req = "SELECT DISTINCT * FROM ". $this->table ." ORDER BY id desc LIMIT 0,5" ;
        $query = $this->_connexion->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }

    public function getOne(){
        $req = "SELECT * FROM ". $this->table ."WHERE id=" .$this->id;
        $query = $this->_connexion->prepare($req);
        $query->execute();
        return $query->fetch();
    }
}