<?php

require __DIR__ . '/../app/PDOManager.php';

class ProduitModel
{

    // Ici on va devoir faire des requetes. Chaque fonction va etre une requetes
    private $pdo; // connexion a la bdd

    public function __construct()
    {
        $this -> pdo = PDOManager::getInstance() -> getPdo();
    }

    public function getAllProduit()
    {
        $resultat = $this -> pdo -> query("SELECT * From produit");
    }

    public function getProduitById($id)
    {
        $resultat = $this("SELECT * FROM produit WHERE id = $id")
    }

}


 ?>
