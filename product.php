<?php

class Product 
{

    private int $id;
    private string $name;
    private int $price;
    private int $quantity;

    public function setId()
    {
        $this->id = $id;
    }

    public function setName()
    {
        $this->name = $name;
    }

    public function setPrice()
    {
        $this->price = $price;
    }

    public function setQuantity()
    {
        $this->quantity = $quantity;
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


}