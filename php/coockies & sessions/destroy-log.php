<?php
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["user"] === "zakariyae"){
        $_SESSION["username"] = $_POST["user"];
        $_SESSION["id"] = 0;
    }
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if(isset($_SESSION["username"])){
    header('Location: session1.php');
}else{

?>

<form action="" method="post">
    <input type="text" name="user" id="">
    <input type="submit" value="log in">
</form>
<?php } ?>