<?php

session_start();

$products = $_SESSION['cart']['products'];

echo "<pre>";
    print_r($products);
    echo "</pre>";
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
  <h1> Resumo do pedido </h1>
  <hr/>
  <table>
    <thead>
      <tr>
        <td>Foto do produto</td>
        <td>Nome do produto</td>
        <td>Quantidade do produto</td>
        <td>Preço do produto</td>
      </tr>
    </thead>
    <tbody> 
    <?php foreach ($products as $product) { ?>
      <?php var_dump($product->getName()) ; ?>
      <tr>
        <td><img src="<?php echo $product['image'] ?>" style="width: 80px; height: 80px; object-fit:cover;" />  </td>
        <td> <?php echo $product['name'] ?></td>
        <td><?php echo $product['quantity'] ?></td>
        <td> R$ <?php echo number_format($product['price'], 2, ', ', '. ');?></td>
        
      </tr>
    <?php } ?>   
    </tbody>
  </table>

</body>
</html>