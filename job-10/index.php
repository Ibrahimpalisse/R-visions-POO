<?php
require_once '../bdd/connexion.php';
require_once './job10.php';

try {
    
    $id = 1; 

   
    $product = new Product(
        $id,
        't-shirt manches longues',
        ['tshirt_manches_longues.png', 'tshirt_manches_longues.jpg'],
        25,
        "Découvrez notre nouveau t-shirt à manches longues, idéal pour toutes les saisons.",
        15,
        1, 
        new DateTime('2022-01-01 10:00:00'),
        new DateTime() 
    );

   
    if ($product->update($bdd)) {
        echo "Le produit a été mis à jour avec succès.";
    } else {
        echo "Une erreur est survenue lors de la mise à jour du produit.";
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
}
?>
