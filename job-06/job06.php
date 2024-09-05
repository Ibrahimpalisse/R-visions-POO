<?php
require_once '../bdd/connexion.php'; 

class Category 
{
    private $id;
    private $name;
    private $description;
    private $createdAt;
    private $updatedAt;

   
    public function __construct($id, $name, $description, $createdAt, $updatedAt) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() { 
        return $this->description;
    }

    public function getCreatedAt() {    
        return $this->createdAt;    
    }

    public function getUpdatedAt() { 
        return $this->updatedAt;
    }

    public function getProducts($bdd) {
        $inser = $bdd->prepare("SELECT * FROM product WHERE category_id = :category_id");
        $inser->bindParam(':category_id', $this->id, PDO::PARAM_INT);
        $inser->execute();
        $products = $inser->fetchAll(PDO::FETCH_ASSOC);

         $products = [];
        foreach ($inser as $product) {
            $products[] = new Product(  
                $product['id'],
                $product['name'],
                $product['photos'],
                $product['price'],
                $product['description'],
                $product['quantity'],
                $product['category_id'],
                $product['createdAt'],
                $product['updatedAt']
            );
     }

   return $products;
   var_dump($products);
}
}
?>