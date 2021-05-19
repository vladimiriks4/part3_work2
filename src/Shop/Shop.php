<?php

namespace App\Shop;

class Shop implements HasMoney
{
    private $products = [];
    private $money;

    public function getMoney() :int
    {
        return $this->money;
    }

    public function addProduct(Product $product) :void
    {
        $this->products[] = $product;
    }

    public function getProductsSortedByPrice() :array
    {
        $productsSortedByPrice = $this->products;
        usort($productsSortedByPrice, function ($a, $b){
            return $b->getPrice() <=> $a->getPrice();
        });
        return $productsSortedByPrice;
    }

    public function sellTheMostExpensiveProduct(Client $client) :bool
    {
        $sortedProducts = $this->getProductsSortedByPrice();

        foreach ($sortedProducts as $key => $product) {
            if ($client->canBuyProduct($product)) {
                $client->buyProduct($product);
                $this->money = (int)($this->money + $product->getPrice());
                $this->sellProduct($product);
                return true;
            }
        }
        return false;
    }

    private function sellProduct(Product $product) :void
    {
        unset($this->products[array_search($product, $this->products)]);
    }
}