<?php
require_once 'job01.php';

$currentDate = new DateTime('2025-01-01 10:00:01');
$updatedat = new DateTime('2023-02-02 03:50:00');
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
$product->setPhotos(["../image/pantalon.png"]);
var_dump($product->getPhotos());
$product->setPrice(2000);
var_dump($product->getPrice());
$product->setDescription("a beautiful pantalon");
var_dump($product->getDescription());
$product->setQuantity(20);
var_dump($product->getQuantity());
$product->setCreatedAt($currentDate);
var_dump($product->getCreatedAt());
$product->setUpdatedAt($currentDate);
var_dump($product->getUpdatedAt());
?>