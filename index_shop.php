<?php

require_once 'bootstrap.php';

use App\Shop\Product;
use App\Shop\Client;
use App\Shop\Shop;

$shop = new Shop();
$shop->addProduct(new Product('Товар 10',5));
$shop->addProduct(new Product('Товар 10',10));
$shop->addProduct(new Product('Товар 100',100));
$shop->addProduct(new Product('Товар 100',100));
$shop->addProduct(new Product('Товар 10',10));
$shop->addProduct(new Product('Товар 1000',1000));

$clients = [100, 1, 10, 1000000, 300];

for ($i=0; $i<count($clients); $i++){
    $client = new Client($clients[$i]);
    $clientName = 'Клиент ' . ($i + 1);
    echo $clientName . ' встал в очередь, У него было денег: ' . $client->getMoney() . '<br>';

    if($shop->sellTheMostExpensiveProduct($client)){
        echo $clientName . ' купил товар ' . $client->getBoughtProduct()->getName();
        echo '. У него осталось денег: ' . $client->getMoney() . '<br><br>';
    } else {
        echo $clientName . ' ничего не купил. У него осталось денег: ' . $client->getMoney() . '<br><br>';
    }
}
echo 'Товаров куплено на сумму ' . $shop->getMoney();
