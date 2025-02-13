<?php

function dire_text($qui ,&$text)  {
    $text = "Bienvennue $qui";
}
$chaine = "Bonjour";
dire_text("cher phpeur",$chaine );
echo $chaine;
