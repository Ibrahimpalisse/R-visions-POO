<?php
require_once '../bdd/connexion.php';
require_once './product.php';
require_once './Clothing.php';
require_once './Electronic.php';

try {
    // Exemple de création de vêtement
    $clothing = new Clothing(
        null,
        'T-shirt à manches longues',
        ['tshirt_manches_longues.png', 'tshirt_manches_longues.jpg'],
        25,
        "Un t-shirt confortable et stylé.",
        100,
        1, // ID catégorie
        new DateTime(),
        new DateTime(),
        'L',  // Taille
        'Rouge',  // Couleur
        'T-shirt',  // Type
        5  // Frais de matériaux
    );

    if ($clothing->createClothing($bdd)) {
        echo "Le vêtement a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du vêtement.";
    }

    // Exemple de création de produit électronique
    $electronic = new Electronic(
        null,
        'Smartphone',
        ['smartphone.png'],
        299,
        "Un smartphone dernier cri.",
        50,
        2, // ID catégorie
        new DateTime(),
        new DateTime(),
        'Samsung',  // Marque
        20  // Frais de garantie
    );

    if ($electronic->createElectronic($bdd)) {
        echo "Le produit électronique a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du produit électronique.";
    }
    
} catch (PDOException $e) {
    echo 'Erreur PDO : ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
