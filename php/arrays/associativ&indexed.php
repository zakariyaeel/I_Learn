<?php

$table = [
    [1, "Ali",30],
    [2,"Salma",25],
    [3, "Anas", 35]
];

$tabAssoc = [
    ["id" => 1, "nom" => "Ali", "age" => 30],
    ["id" => 2, "nom" => "Salma", "age" => 25],
    ["id" => 3, "nom" => "Anas", "age" => 35]
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        h1,h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Liste des Noms</h1>

    <h2>Table indicée</h2>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Age</th>
        </tr>
        <?php foreach($table as $tb){ ?>
            <tr>
                <?php foreach($tb as $t){ ?>
                    <td><?php echo $t ; ?></td>
                <?php }?>
            </tr>
        <?php }?>
    </table>

    <h2>Table associatif</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Age</th>
        </tr>
        <?php foreach($tabAssoc as $tb){
            echo "<tr>";
            foreach($tb as $t => $value){
                echo "
                <td>".$value."</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h2>avec la boucle For (table indicée)</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Age</th>
        </tr>
        <?php
            for($i = 0;$i<count($table);$i++){
                echo "<tr>";
                for($j = 0;$j<count($table[$i]);$j++){
                    echo "<td>".$table[$i][$j]."</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    <h2>avec boucle For (table associatif)</h2>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Age</th>
        </tr>
        <?php
            for ($i = 0; $i < count($tabAssoc); $i++) {
                echo "<tr>";
                $key = array_keys($tabAssoc[$i]);
                for($j=0; $j<count($key); $j++){
                    echo "<td>" . $tabAssoc[$i][$key[$j]] . "</td>";
                }
                echo "</tr>";
            }

        ?>
    </table>
</body>
</html>
