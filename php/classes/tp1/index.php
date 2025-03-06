<?php

require 'personne.php';

$p1 = new Personne();
$p1->affectID(100);
$p1->settNom("hillali");
$p1->setPrenom("Amine");
$p1->afficher();

$p2 = new Personne(200,"Ayouch","Jamal");
$p2->afficher();

define("organes_vitaux", 5);
