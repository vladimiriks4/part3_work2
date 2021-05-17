<?php

namespace App\Shop;

class Shop implements HasMoney
{
    private $products = [];
    private $money;

    public function getMoney()
    {
        return 'Товаров куплено на сумму ' . $this->money;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProductsSortedByPrice()
    {
        $productsSortedByPrice = $this->products;
        usort($productsSortedByPrice, function ($a, $b){
            return $b->getPrice() <=> $a->getPrice();
        });
        return $productsSortedByPrice;
    }

    public function sellTheMostExpensiveProduct(Client $client)
    {
        $message = ' встал в очередь, У него было денег: ' . $client->getMoney() . '<br>';
        $sortedProducts = $this->getProductsSortedByPrice();
        
        foreach ($sortedProducts as $key => $product) {
            if ($client->canBuyProduct($product)) {
                $client->buyProduct($product);
                $this->money = $this->money + $product->getPrice();
                $this->sellProduct($product);
                return $message;
            }
        }
        return $message;
    }

    private function sellProduct(Product $product)
    {
        unset($this->products[array_search($product, $this->products)]);
    }
}