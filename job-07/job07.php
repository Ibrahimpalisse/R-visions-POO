<?php
class Product
{
   private $id;
   private $name;
   private $photos;
   private $price;
   private $description;
   private $quantity;
   private $category_id;
   private $createdAt;
   private $updatedAt;
   
   public function __construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt) {
       $this->id = $id;
       $this->name = $name;
       $this->photos = $photos;
       $this->price = $price;
       $this->description = $description;
       $this->quantity = $quantity;
       $this->category_id = $category_id;
       $this->createdAt = $createdAt;
       $this->updatedAt = $updatedAt;
   }

   public static function findOneByid($bdd, int $id) {
       $inser = $bdd->prepare("SELECT * FROM product WHERE id = :id");
       $inser->bindParam(':id', $id, PDO::PARAM_INT);
       $inser->execute();
       $productData = $inser->fetch(PDO::FETCH_ASSOC);
       if ($productData) {
           return new Product(
               $productData['id'],
               $productData['name'],
               json_decode($productData['photos'], true), // Conversion JSON en tableau
               $productData['price'],
               $productData['description'],
               $productData['quantity'],
               $productData['category_id'],
               new DateTime($productData['createdAt']),
               new DateTime($productData['updatedAt'])
           );
       }else {
         return false;
       }
       
   }
}

?>