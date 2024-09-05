<?php
require_once '../bdd/connexion.php';

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

    // Méthode pour vérifier si une catégorie est valide
    private function isValidCategoryId($bdd) {
        $query = "SELECT id FROM category WHERE id = :category_id";
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Méthode pour créer un produit en base de données
    public function create($bdd) {
        try {
            $query = "INSERT INTO product (name, photos, price, description, quantity, category_id, createdAt, updatedAt) 
                      VALUES (:name, :photos, :price, :description, :quantity, :category_id, :createdAt, :updatedAt)";

            $inser = $bdd->prepare($query);

            $photos = json_encode($this->photos);
            $createdAt = $this->createdAt->format('Y-m-d H:i:s');
            $updatedAt = $this->updatedAt->format('Y-m-d H:i:s');

            $inser->bindParam(':name', $this->name, PDO::PARAM_STR);
            $inser->bindParam(':photos', $photos, PDO::PARAM_STR);
            $inser->bindParam(':price', $this->price, PDO::PARAM_INT);
            $inser->bindParam(':description', $this->description, PDO::PARAM_STR);
            $inser->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
            $inser->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
            $inser->bindParam(':createdAt', $createdAt, PDO::PARAM_STR);
            $inser->bindParam(':updatedAt', $updatedAt, PDO::PARAM_STR);

            if ($inser->execute()) {
                $this->id = $bdd->lastInsertId(); // Obtenir l'ID du dernier enregistrement
                return $this;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur PDO : ' . $e->getMessage();
            return false;
        }
    }

    // Méthode pour mettre à jour un produit en base de données
    public function update($bdd) {
        if ($this->id === null) {
            throw new Exception('L\'identifiant du produit n\'existe pas');
        }

        // Vérifier si l'ID de catégorie est valide
        if (!$this->isValidCategoryId($bdd)) {
            throw new Exception('L\'ID de la catégorie n\'est pas valide.');
        }

        try {
            $mettre_Ajour = "UPDATE product SET name = :name, photos = :photos, price = :price, description = :description, quantity = :quantity, category_id = :category_id, updatedAt = :updatedAt WHERE id = :id";
            $aller = $bdd->prepare($mettre_Ajour);

            $photos = json_encode($this->photos);
            $updatedAt = $this->updatedAt->format('Y-m-d H:i:s');

            $aller->bindParam(':name', $this->name, PDO::PARAM_STR);
            $aller->bindParam(':photos', $photos, PDO::PARAM_STR);
            $aller->bindParam(':price', $this->price, PDO::PARAM_INT);
            $aller->bindParam(':description', $this->description, PDO::PARAM_STR);
            $aller->bindParam(':quantity', $this->quantity, PDO::PARAM_INT);
            $aller->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
            $aller->bindParam(':updatedAt', $updatedAt, PDO::PARAM_STR);
            $aller->bindParam(':id', $this->id, PDO::PARAM_INT);

            if ($aller->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur PDO : ' . $e->getMessage();
            return false;
        }
    }
}
?>
