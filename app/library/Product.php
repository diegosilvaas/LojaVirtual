<?php

namespace app\library;

class Product
{

  private int $id;
  private string $name;
  private int $price;
  private int $quantity;
  private string $image;

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

  public static function getProducts()
  {
    return [
      1 => ['id' => 1, 'name' => 'geladeira', 'price' => 1000, 'quantity' => 1, 'image'=>'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cookeletroraro.com.br%2Fgeladeira-samsung-french-door-530-litros-inox-110v-rf23r6301sr-az%2Fp&psig=AOvVaw29NldEgaRbSnJg3YNXpYgJ&ust=1683686097806000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCOiNvNCZ5_4CFQAAAAAdAAAAABAG'],
      2 => ['id' => 2, 'name' => 'mouse', 'price' => 100, 'quantity' => 1, 'image'=>'https://www.google.com/imgres?imgurl=https%3A%2F%2Fimages.tcdn.com.br%2Fimg%2Fimg_prod%2F1041964%2Fmouse_gamer_evolut_rayden_eg_104rb_75_1_c6e0cc5b93b83fa980e64a8ba4a4d17b.jpg&tbnid=e67mZiVvQyL6hM&vet=12ahUKEwiZieLamef-AhUeJrkGHVpiAeUQMygOegUIARDGAg..i&imgrefurl=https%3A%2F%2Fwww.klvnotebook.com.br%2Fperifericos%2Fmouse-gamer-evolut-rayden-eg-104rb&docid=IBYuJzqPNvcDSM&w=1080&h=1080&q=mouse&ved=2ahUKEwiZieLamef-AhUeJrkGHVpiAeUQMygOegUIARDGAg'],
      3 => ['id' => 3, 'name' => 'teclado', 'price' => 10, 'quantity' => 1, 'image'=>'https://www.google.com/aclk?sa=l&ai=DChcSEwiu2pTnmef-AhULNZEKHfhXBg4YABAHGgJjZQ&sig=AOD64_0PDSiSO7Ga5OGFtLiKQwaGuNQRew&adurl&ctype=5&ved=2ahUKEwil3Ivnmef-AhV2GLkGHTTEDA8Qvhd6BAgBEFw'],
      4 => ['id' => 4, 'name' => 'monitor', 'price' => 5000, 'quantity' => 1, 'image'=>'https://www.google.com/imgres?imgurl=http%3A%2F%2Fi.dell.com%2Fis%2Fimage%2FDellContent%2Fcontent%2Fdam%2Fss2%2Fproduct-images%2Fdell-client-products%2Fperipherals%2Fmonitors%2Fg-series%2Fg2722hs%2Fpdp%2Fmonitor-dell-gaming-g2722hs-pdp-hero.psd%3Ffmt%3Djpg%26wid%3D5000%26hei%3D3470&tbnid=uRpDurpepl3noM&vet=12ahUKEwjwjqvvmef-AhWjA7kGHV8QDCwQMygAegUIARCJAg..i&imgrefurl=https%3A%2F%2Fwww.dell.com%2Fpt-br%2Fshop%2Fmonitor-dell-gamer-de-27-g2722hs%2Fapd%2F210-benq%2Fmonitores-e-acess%25C3%25B3rios&docid=oGDJFXkA1k3HOM&w=5000&h=3470&q=monitor%20%5D&ved=2ahUKEwjwjqvvmef-AhWjA7kGHV8QDCwQMygAegUIARCJAg'],
    ];
  }
}