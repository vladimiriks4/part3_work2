<?php

namespace App\Shop;

class Client implements HasMoney
{
    private $product;
    protected $money;

    public function __construct(int $money)
    {
        $this->money = $money;
    }

    public function getMoney() :int
    {
        return $this->money;
    }

    public function canBuyProduct(Product $product) :bool
    {
        return $product->getPrice() <= $this->getMoney();
    }

    public function buyProduct(Product $product) :void
    {
        $this->money = $this->money - $product->getPrice();
        $this->product = $product;
    }

    public function getBoughtProduct() :Product
    {
        return $this->product;
    }
}