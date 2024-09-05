<?php
require_once "../bdd/connexion.php"; 
require_once "./job06.php";

try {
    $categoryId = 1; 
    
    
    $stmt = $bdd->prepare("SELECT * FROM category WHERE id = :id");
    $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    
    $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($categoryData) {
        
        $category = new Category(
            $categoryData['id'],
            $categoryData['name'],
            $categoryData['description'],
            new DateTime($categoryData['createdAt']),
            new DateTime($categoryData['updatedAt'])
        );

        
        $products = $category->getProducts($bdd);

    
        var_dump($category);
        var_dump($products);
    } else {
        echo "Aucune catégorie trouvée avec l'ID $categoryId.";
    }
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

