<?php

namespace app\library;

class Product
{

  private int $id;
  private string $name;
  private int $price;
  private int $quantity;
  private string $image;
  private string $category;

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function setPrice(int $price)
  {
    $this->price = $price;
  }

  public function setQuantity(int $quantity)
  {
    $this->quantity = $quantity;
  }

  public function setImage(string $image)
  {
    $this->image = $image;
  }

  public function setCategory(string $category)
  {
    $this->category = $category;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public static function getProducts()
  {
    return [
      1 => ['id' => 1, 'name' => 'computador', 'price' => 1000, 'quantity' => 1, 'image'=>'product05.png', 'category'=>'informatica'],
      2 => ['id' => 2, 'name' => 'mouse', 'price' => 100, 'quantity' => 1, 'image'=>'product01.png', 'category'=>'informatica'],
      3 => ['id' => 3, 'name' => 'teclado', 'price' => 10, 'quantity' => 1, 'image'=>'product02.png', 'category'=>'informatica'],
      4 => ['id' => 4, 'name' => 'monitor', 'price' => 5000, 'quantity' => 1, 'image'=>'product03.png', 'category'=>'informatica'],
      5 => ['id' => 5, 'name' => 'notebook', 'price' => 5000, 'quantity' => 1, 'image'=>'product06.png', 'category'=>'informatica'],
    ];
  }
  
}