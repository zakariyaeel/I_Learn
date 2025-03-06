<?php

class Personne{
    private int $id;
    private string $nom;
    private string $prenom;

    public function __construct(int $id =0, string $nom= "", string $prenom =""){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
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
    }

    // Setters
    public function affectID(int $id){
        $this->id = $id;
    }
    public function settNom(String $nom){
        $this->nom = $nom;
    }
    public function setPrenom(String $prenom){
        $this->prenom = $prenom;
    }
}

