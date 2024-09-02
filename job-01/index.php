<?php
require_once 'job01.php';

$currentDate = new DateTime();
$product = new  product(1, "t_sherte", ["../image/t_shirt.png"],1000,"a beautiful t_shirt", 10, new DateTime(),new DateTime());

var_dump($product->getID());
var_dump($product->getName());
var_dump($product->getPhotos());
var_dump($product->getPrice());
var_dump($product->getDescription());
var_dump($product->getQuantity());
var_dump($product->getCreatedAt());
var_dump($product->getUpdatedAt());

$product->setID(2);
var_dump($product->getID());
$product->setName("pantalon");
var_dump($product->getName());
?>