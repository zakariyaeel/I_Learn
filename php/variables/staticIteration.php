<?php

function liste_personnes(){
    static $liste = array();
    $numArgs = func_num_args();

    for($i=0;$i<$numArgs;$i++){
        array_push($liste,func_get_arg($i));
    }
    return $liste;
}

liste_personnes("Jean");
liste_personnes("Katia");
liste_personnes("kamil");

echo "<pre>";
print_r(liste_personnes());
echo "</pre>";
