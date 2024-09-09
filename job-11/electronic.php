<?php
require_once 'Product.php'; // Assurez-vous que ce chemin est correct

class Electronic extends Product {
    private $brand;
    private $warranty_fee;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt, $brand, $warranty_fee) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt);
        $this->brand = $brand;
        $this->warranty_fee = $warranty_fee;
    }

    // Getters and other methods...

    public function createElectronic($bdd) {
        if (parent::create($bdd)) {
            $query = "INSERT INTO electronic (product_id, brand, warranty_fee) VALUES (:product_id, :brand, :warranty_fee)";
            $stmt = $bdd->prepare($query);

            $productId = $this->getId();
            $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':brand', $this->brand, PDO::PARAM_STR);
            $stmt->bindParam(':warranty_fee', $this->warranty_fee, PDO::PARAM_INT);

            return $stmt->execute();
        }
        return false;
    }
}
?>
