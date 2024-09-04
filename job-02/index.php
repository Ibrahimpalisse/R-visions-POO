<?php
require_once 'classe Product.php';
require_once 'job02.php';

$currentDate = new DateTime('2020-01-01 00:00:00');
$updatedat = new DateTime('2023-02-02 01:00:00');

$category = new Category(1, "t_shirt", "Vêtements", $currentDate, $updatedat);

var_dump($category->getId());
echo"</br>";
var_dump($category->getName());
echo"</br>";
var_dump($category->getDescription());
echo"</br>";
var_dump($category->getCreatedAt());
echo"</br>";
var_dump($category->getUpdatedAt());
echo"</br>";
$category->setId(2);
echo"</br>";
var_dump($category->getId());

$category->setName("pantalon");
echo"</br>";
var_dump($category->getName());

$category->setDescription("Vêtements de qualité");
echo"</br>";
var_dump($category->getDescription());

$category->setCreatedAt(new DateTime('2000-10-20 00:10:00'));
echo"</br>";
var_dump($category->getCreatedAt());


echo"</br>";
echo"</br>";

$product = new  Product(1, "t_shirt", ["../image/t_shirt.png"],1000,"a beautiful t_shirt", 10,$category->getID(), $currentDate, $updatedat);

var_dump($product->getId()); 
echo"</br>";   
var_dump($product->getName());
echo"</br>";
var_dump($product->getPhotos());
echo"</br>";
var_dump($product->getPrice());
echo"</br>";
var_dump($product->getDescription());
echo"</br>";
var_dump($product->getQuantity());
echo"</br>";
var_dump($product->getCategory_id());
echo"</br>";
var_dump($product->getCreatedAt());
echo"</br>";
var_dump($product->getUpdatedAt());



?>