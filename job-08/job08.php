<?php
class Product {
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

   
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhotos() {
        return $this->photos;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }


    public static function findAll($bdd) {
        $stmt = $bdd->query("SELECT * FROM product");
        $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new Product(
                $row['id'],
                $row['name'],
                json_decode($row['photos'], true),
                $row['price'],
                $row['description'],
                $row['quantity'],
                $row['category_id'],
                new DateTime($row['createdAt']),
                new DateTime($row['updatedAt'])
            );
        }
        return $products;
    }

   
}
?>
