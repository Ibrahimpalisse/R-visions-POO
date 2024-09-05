<?php
require_once '../bdd/connexion.php';
require_once './job09.php';


    $newInstance = new Product(
        null,
        'debardeur',
        ['debardeur.png', 'debardeur.jpg'],
        100,
        "Découvrez le débardeur idéal pour vos séances d'entraînement",
        10,
        1,
        new DateTime(),
        new DateTime(),
    );

    $createdProduct = $newInstance->create($bdd);
    

    if($createdProduct){
        echo "<br>Le produit a été créé avec l'id ";
    }else{
        echo "<br>Une erreur est survenue lors de la création du produit.";
    }


?>