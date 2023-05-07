<?php

require 'Product.php';
require 'Cart.php';

session_start();

$cart= new Cart;
$productsIncart = $cart->getCart();

var_dump($productsIncart);
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
    <input type="text" value="<?php echo $product->getQuantity() ?>">
    Price: R$ <?php echo number_format ($product->getPrice(), 2,','.') ?>
        Subtotal: <?php number_format(->getPrice() * $product->getQuantity() ?>


    <?php endforeach; ?>
</ul>
    
</body>
</html>