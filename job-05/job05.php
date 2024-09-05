<?php
require_once '../bdd/connexion.php';
require_once '../job-02/job02.php'; // Assurez-vous que la connexion est incluse

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

    // Constructeur
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

    // Getters
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

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPhotos($photos) {
        $this->photos = $photos;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    

    public function getCategory() {
        global $bdd; 

        $stmt = $bdd->prepare("SELECT * FROM category WHERE id = :id");
        $stmt->bindParam(':id', $this->category_id, PDO::PARAM_INT);
        $stmt->execute();
        $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoryData) {
            return new Category(
                $categoryData['id'],
                $categoryData['name'],
                $categoryData['description'],
                new DateTime($categoryData['createdAt']),
                new DateTime($categoryData['updatedAt'])
            );
        } else {
            throw new Exception("La catégorie avec l'ID {$this->category_id} n'existe pas.");
        }
    }
}
?>
