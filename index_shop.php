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
    $countClient = $i + 1;
    $client = new Client($clients[$i]);
    echo 'Клиент ' . $countClient . $shop->sellTheMostExpensiveProduct($client);
    echo 'Клиент ' . $countClient . $client->getBoughtProduct();
}
echo $shop->getMoney();
