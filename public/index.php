<?php

use app\library\Cart;
use app\library\Product;

require '../vendor/autoload.php';

session_start();
$products = Product::getProducts();

if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $productInfo = $products[$id];
  $product = new Product;
  $product->setId($productInfo['id']);
  $product->setName($productInfo['name']);
  $product->setPrice($productInfo['price']);
  $product->setQuantity($productInfo['quantity']);
  $product->setImage($productInfo['image']);
  $product->setCategory($productInfoo)['category'];
  
  $cart = new Cart;
  $cart->add($product);
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
  <a href="http://localhost/LojaVirtual/public/myCart.php">Go to cart</a>

  <ul>
    <?php foreach ($products as $product) { ?>
      <li>
        <?php echo ucfirst($product['name']); ?>|
        <a href="?id=<?php echo $product['id']; ?>"></a> |
        <?php echo number_format($product['price'], 2, ', ', '. '); ?>
      </li>
    <?php } ?>
  </ul>

  <ul>
    <li>Geladeira <a href="?id=1">Add</a> R$ 3000</li>
    <li>Mouse <a href="?id=2">Add</a> R$ 200</li>
    <li>Teclado <a href="?id=3">Add</a> R$ 3000</li>
    <li>Monitor <a href="?id=4">Add</a> $$ 1500</li>
  </ul>
</body>

</html>