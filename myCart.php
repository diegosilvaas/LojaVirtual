<?php

require 'Product.php';
require 'Cart.php';

session_start();

$cart= new Cart;
$productsIncart = $cart->getCart();


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
    <?php foreach($productsIncart as $product): ?>
    <li><?php echo $product->getName ?></li>
    <?php endforeach; ?>
</ul>
    
</body>
</html>