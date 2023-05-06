<?php

if (isset($_GET['add'])) {
    $id = strip_tags($_GET['id']);
    var_dump($id);

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        </head>
        <body>
            <ul>
                <li> Geladeira <a href="?id=1">Add</a>R$3000</li>
                <li> Mouse <a href="?id=1">Add</a>R$200</li>
                <li> Teclado <a href="?id=1">Add</a>R$300</li>
                <li> Monitor <a href="?id=1">Add</a>R$1500</li>
              

            </ul>

        </body>
</html>