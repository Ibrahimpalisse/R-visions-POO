<?php
try {

    $bdd = new PDO('mysql:host=localhost;dbname=draft_shop;charset=utf8', 'root', '');
    

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {

    echo 'Erreur PDO : ' . $e->getMessage();
} catch (Exception $e) {
  
    echo 'Erreur : ' . $e->getMessage();
}
?>
