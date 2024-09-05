<?php
require_once '../bdd/connexion.php';
require_once './job07.php';

try{
    $id = 1;

    $product = Product::findOneByid($bdd, $id);

    if($product){
        var_dump($product);
    }else{
        echo "Aucun produit avec l'id $id";
    }
}catch(PDOException $e){
    echo 'Erreur PDO : ' . $e->getMessage();
}
?>