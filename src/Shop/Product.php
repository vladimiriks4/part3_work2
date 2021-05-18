<?php

namespace App\Shop;

class Product
{
    protected $name;
    protected $price;

    public function __construct($name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() :int
    {
        return $this->price;
    }

    public function getName() :string
    {
        return $this->name;
    }
}