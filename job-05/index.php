<?php
require_once "../bdd/connexion.php";
require_once "./job05.php";


try {
    
    $id = 7;
    $stmt = $bdd->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($productData) {
        $product = new Product(
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

        $category = $product->getCategory();

    
        var_dump($product);
        var_dump($category);
    } else {
        echo "Aucun produit trouvé avec l'ID $id.";
    }
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
