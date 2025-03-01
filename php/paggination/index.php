<?php
$nbpages = 100;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <style>
        .links{
            padding: 10px;
            display: inline;
        }
    </style>
</head>
<body>
    <?php if($page>$nbpages || $page < 1)
        echo "Page not found";
    else {
    ?>
    <h1>Vous êtes dans la page <?php echo $page; ?></h1>

<div class="liens">
    <!-- min number page -->
    <a href="?page=1">min</a>
    <?php if ($page > 1) : ?>
        <a href="?page=<?php echo $page - 1; ?>"><<</a>
    <?php endif; ?>
        <?php ?>
    <?php 
        for ($i = 0; $i<5;$i++){
            if($page+$i > $nbpages){
                break;
            }else if($page <1){
                break;
            }
            // current page coloring
            if($page == $page+$i){
                
                echo "<div class='links' style='color:red;'>".($page+$i)."</div>";
                continue;
            }

            echo "<div class='links'><a href='?page=".($page+$i)."'>".($page+$i)."</a></div>";
        }
    ?>   
    <?php if ($page < $nbpages) : ?>
        <a href="?page=<?php echo $page + 1; ?>">>></a>
    <?php endif; ?>
    <!-- max number page -->
    <a href="?page=<?php echo $nbpages; ?>">max</a>
    </div>
    <?php } ?>
</body>
</html>
