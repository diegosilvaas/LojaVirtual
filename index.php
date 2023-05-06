<?php

session_start();

require 'Cart.php';
require 'Product.php';

$products = [
    1 => ['id' => '1', 'name' => 'geladeira', 'price' => 3000, 'quantity' => 1],
    2 => ['id' => '2', 'name' => 'mouse', 'price' => 200, 'quantity' => 1],
    3 => ['id' => '3', 'name' => 'teclado', 'price' => 300, 'quantity' => 1],
    4 => ['id' => '4', 'name' => 'monitor', 'price' => 1500, 'quantity' => 1],
];

if (isset($_GET['add'])) {
    $id = strip_tags($_GET['id']);
    $productInfo = $products[$id];
    $product = new Product;
    $product->setId($productInfo['id']);
    $product->setName($productInfo['name']);
    $product->setPrice($productInfo['price']);
    $product->setQuantity($productInfo['quantity']);

    $cart = new Cart();
    $cart

}

var_dump($_SESSION['cart'] ?? []);

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