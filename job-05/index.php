<?php
require_once "../bdd/connexion.php";
require_once "../job-02/classe Product.php";
require_once "../job-02/job02.php";

try {
    // Récupération du produit avec l'ID 7
    $id = 7;
    $stmt = $bdd->prepare("SELECT * FROM product WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $productData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($productData) {
        // Création de l'objet Product
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

        // Récupération de la catégorie associée au produit
        $category = $product->getCategory();

        // Affichage des données du produit et de sa catégorie
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
