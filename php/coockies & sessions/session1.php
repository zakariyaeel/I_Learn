<?php

session_start();

$_SESSION["name"] = $_COOKIE["name"];

echo "default id ==> " . session_id();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo $_COOKIE["name"];
echo "<style>body{background-color: " . $_COOKIE["bg-color"] . "</style>"
?>
<br>
<a href="tp-bg.php">tisti</a><br>

<?php

isset($_SESSION["views"]) ? $_SESSION["views"]++ : $_SESSION["views"] = 1;
echo "Hello " . $_SESSION["name"] . " you visit us <mark>" . $_SESSION["views"] . " time</mark>";

?>
<br>
<hr>
<a href="destroy-unset.php"><mark>Log out</mark></a>