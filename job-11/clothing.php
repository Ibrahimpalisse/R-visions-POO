<?php
require_once 'Product.php';


class Clothing extends Product {
    private $size;
    private $color;
    private $type;
    private $material_fee;

    public function __construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt, $size, $color, $type, $material_fee) {
        parent::__construct($id, $name, $photos, $price, $description, $quantity, $category_id, $createdAt, $updatedAt);
        $this->size = $size;
        $this->color = $color;
        $this->type = $type;
        $this->material_fee = $material_fee;
    }

    // Getters and other methods...

    public function createClothing($bdd) {
        if (parent::create($bdd)) {
            $query = "INSERT INTO clothing (product_id, size, color, type, material_fee) VALUES (:product_id, :size, :color, :type, :material_fee)";
            $stmt = $bdd->prepare($query);

            $productId = $this->getId();
            $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':size', $this->size, PDO::PARAM_STR);
            $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
            $stmt->bindParam(':type', $this->type, PDO::PARAM_STR);
            $stmt->bindParam(':material_fee', $this->material_fee, PDO::PARAM_INT);

            return $stmt->execute();
        }
        return false;
    }
}
?>
