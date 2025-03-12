<?php
//php : coockies;
//we use function setcoockie()
//infinite coockie katzid lcockie fay browser;

setcookie("style","black",time()+60*60*24*30*365);// ==> / means the current dir
//to destroy coockie :
setcookie("style","black",time() - 1);
// setcookie("style","black",time() + 5,'/');//==> after 5 s
setcookie("style","black",1);


//add array to cockie:
setcookie("style[color]","lightblue");
setcookie("style[size]","15px");
setcookie("style[weight]","600");

echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
if(isset($_COOKIE["style"])){
    setcookie("style","orange",strtotime("+1 year"));
    setcookie("style","orange",1);
    echo $_COOKIE["style"]["size"];
}


?>