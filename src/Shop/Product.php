<?php

namespace App\Shop;

class Product
{
    protected string $name;
    protected int $price;

    public function __construct(string $name, int $price)
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