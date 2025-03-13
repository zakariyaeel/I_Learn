<?php

class Personne{
    private int $id;
    private string $nom;
    private string $prenom;

    public const organes_vitaux = 5;

    public function __construct(){
        $args = func_get_args();
        $nb_args = func_num_args();
        if($nb_args == 0){
            $this->id = 0;
            $this->nom = "";
            $this->prenom = "";
        }
        else if($nb_args <= 3){
            $this->id = $args[0];
            $this->nom = $args[1];
            $this->prenom = $args[2];
        }
        
    }
    // Getters
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function afficher(){
        echo "ID: ".$this->id." | Nom: ".$this->nom." | Prenom: ".$this->prenom . "<br>";
        echo "nbr des organes vitaux: ". self::organes_vitaux ."<br> <hr>";
    }

    // Setters
    public function affectID(int $id):self{
        $this->id = $id;
        return $this;
    }
    public function settNom(String $nom):void{
        $this->nom = $nom;
    }
    public function setPrenom(String $prenom):void{
        $this->prenom = $prenom;
    }

    public static function afficherOrganeVitaux(){
        echo "Nombre d'organes vitaux: ". self::organes_vitaux ."<br>";
    }
}
