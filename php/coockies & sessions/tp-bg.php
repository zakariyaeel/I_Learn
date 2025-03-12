<?php

if(isset($_COOKIE["bg-color"])){
    echo "<style>body{background-color:" . $_COOKIE["bg-color"] ."}</style>";
    echo '<h1>Hello ' . $_COOKIE["name"] .'<h1>';

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    setcookie("bg-color", $_POST["bg"], strtotime("+1 year"));
    setcookie("name", $_POST["name"], strtotime("+1 year"));
    header("Location: ". $_SERVER["REQUEST_URI"]);
    exit();
}

?>

<form method="post">
    <input type="text" name="name" id=""><br>
    <input type="color" name="bg" id="">
    <input type="submit" value="Change bg">
</form>
<a href="session1.php">siiir</a>