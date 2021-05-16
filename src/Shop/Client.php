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

    public function getMoney()
    {
        return $this->money;
    }

    public function canBuyProduct(Product $product) :bool
    {
        return $product->getPrice() <= $this->getMoney();
    }

    public function buyProduct(Product $product)
    {
        $this->money = $this->money - $product->getPrice();
        $this->product = $product;
        return $product->getPrice();
    }

    public function getBoughtProduct()
    {
        if($this->product){
            return ' купил товар ' . $this->product->getName() . '. У него осталось денег: ' . $this->getMoney() . '<br><br>';
        }
        return ' ничего не купил. У него осталось денег: ' . $this->getMoney() . '<br><br>';
    }
}