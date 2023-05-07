<?php

require 'Product.php';
require 'Cart.php';

session_start();

$cart= new Cart;
$productsIncart = $cart->getCart();

var_dump($productsIncart);

if(isset($_GET['id']))
{
    $id = strip_tags($_GET['id']);
    $cart->remove($id);
    header('Location: myCart.php');
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

<a href="/"> Go to home </a>

<ul>
    <?php if(count($productsIncart) <=0): ?>
        Nenhum prdoduto no carrinho
        <?php endif; ?>
    <?php foreach($productsIncart as $product): ?>
    <li><?php echo $product->getName ?></li>
    <input type="text" value="<?php echo $product->getQuantity() ?>">
    Price: R$ <?php echo number_format ($product->getPrice(), 2,',','.') ?>
        Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2,',', '.') ?>
        <a href="?id=<?php echo $product->getId() ?>">remove</a>


    <?php endforeach; ?>
    <li>Total: R$ <?php echo number_format ( $cart->$getTotal(), 2,', ', '. ');  ?></li>
</ul>
    
</body>
</html>