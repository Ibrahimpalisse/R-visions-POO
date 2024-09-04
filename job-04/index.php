<?php
require_once "../bdd/connexion.php";
require_once "../job-02/classe Product.php";
require_once "../job-02/job02.php";

try {

    if (!isset($bdd)) {
        throw new Exception("La connexion à la base de données n'a pas été établie.");
    }

    $id = 7; 
    

    $stmt = $bdd->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
  
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($productData) {

        $stmtCategory = $bdd->prepare("SELECT * FROM category WHERE id = :category_id");
        $stmtCategory->bindParam(':category_id', $productData['category_id'], PDO::PARAM_INT);
        $stmtCategory->execute();
        

        $categoryData = $stmtCategory->fetch(PDO::FETCH_ASSOC);

        $category = new Category(
            $categoryData['id'],
            $categoryData['name'],
            $categoryData['description'],
            new DateTime($categoryData['createdAt']),
            new DateTime($categoryData['updatedAt'])
        );
        
        $product = new Product(
            $productData['id'],
            $productData['name'],
            json_decode($productData['photos'], true), // Conversion JSON en tableau
            $productData['price'],
            $productData['description'],
            $productData['quantity'],
            $category->getId(), 
            new DateTime($productData['createdAt']),
            new DateTime($productData['updatedAt'])
        );
        
        var_dump($product);
    } else {
        echo "Aucun produit trouvé avec l'ID $id.";
    }
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
