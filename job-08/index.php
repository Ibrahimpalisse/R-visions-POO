<?php
require_once "../bdd/connexion.php";
require_once "./job08.php";

try {
    $products = Product::findAll($bdd);

    if (!empty($products)) {
        foreach ($products as $product) {
            // Affichage des photos
            $photosHtml = '';
            if (is_array($product->getPhotos())) {
                foreach ($product->getPhotos() as $photo) {
                    $photosHtml .= '<img src="' . htmlspecialchars($photo) . '" alt="Photo" style="max-width: 200px; margin: 5px;">';
                }
            } else {
                $photosHtml = 'Aucune photo disponible';
            }

            echo "<div>
                    <p><strong>ID:</strong> " . htmlspecialchars($product->getId()) . "</p>
                    <p><strong>Nom:</strong> " . htmlspecialchars($product->getName()) . "</p>
                    <p><strong>Photos:</strong> " . $photosHtml . "</p>
                    <p><strong>Prix:</strong> " . htmlspecialchars($product->getPrice()) . "</p>
                    <p><strong>Description:</strong> " . htmlspecialchars($product->getDescription()) . "</p>
                    <p><strong>Quantité:</strong> " . htmlspecialchars($product->getQuantity()) . "</p>
                    <p><strong>Catégorie:</strong> " . htmlspecialchars($product->getCategoryId()) . "</p>
                    <p><strong>Date de création:</strong> " . htmlspecialchars($product->getCreatedAt()->format('Y-m-d H:i:s')) . "</p>
                    <p><strong>Date de mise à jour:</strong> " . htmlspecialchars($product->getUpdatedAt()->format('Y-m-d H:i:s')) . "</p>
                 </div><hr>"; 
        }
    } else {
        echo "Aucun produit trouvé.";
    }
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>
