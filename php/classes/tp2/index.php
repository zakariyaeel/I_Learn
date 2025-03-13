<?php

require 'personne.php';
require 'employe.php';

$p1 = new Personne();
$p1->affectID(100);
// $p1->settNom("hillali");
// $p1->setPrenom("Amine");
$p1->afficher();

$p2 = new Personne(200,"Ayouch","Jamal");
$p2->afficher();

echo "<br>";
Personne::afficherOrganeVitaux();
echo "<hr>";

$emp = new Employe(2000,"Ayouch","Jamal",5000);
$emp->afficher();

