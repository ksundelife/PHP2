<?php
echo "<pre>";
use app\models\{Product, User, Basket, Order};
use app\engine\{Db, Autoload};

include "../engine/Autoload.php";


spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product(new Db());

$product->price = 50;
var_dump($product);
var_dump($product->getOne(5));

$user = new User(new Db());
var_dump($user->getAll());

$basket = new Basket(new Db());
var_dump($basket);

$order = new Order(new Db());
var_dump($order);

