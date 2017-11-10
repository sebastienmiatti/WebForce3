<?php
// récupère les résultat de chacunes des requetes pour le transformer en objet; a chaques fonctionnalité on a besoin de récupérer des fonctionnalité depuis la table de donnée.
// on a créé findAll pour récupéré tout le s produits de toute la table
// l'idée du DAO c'est tant qu'on peux récupérer des objet au lieu des array.


namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class ProduitDAO
{
    private $db; // Va contenir notre objet Connection, qui representera la connexion a la BDD.

    public function __construct(Connection $db)
    {
            $this -> db = $db;
    }

    public function getDb()
    {
        return $this -> db;
    }

    public function setDb()
    {
        $this -> db = $db;
    }

    public function findAll()
    {
        //Fontion pour récupérer tous les produits dans la BDD :

        $requete = "SELECT * FROM produit";
        $resultat = $this -> getDb() -> fetchAll($requete);

        //resultat : Contient tous les produits sous forme d'un array multidimentionnel

        $produits = array();
        foreach($resultat as $value)
        {
            $id_produit = $value['id_produit'];
            $produits[$id_produit] = $this -> buildProduit($value);
        }

        return $produits;

    }

    // Toutes les autres requetes de l'entité Produit seront ici
    // ---
    // ---

    public function findAllCategories()
    {
        $req = "SELECT DISTINCT categorie FROM produit";
        $resultat = $this -> getDb() -> fetchAll($req);
            // $resultat est un tableau multidimentionnel avec toutes les catégories
        return $resultat;
    }


    public function findById($id)
    {
        // Fonction pour récupérer un produit dans la BDD :
        $requete = "SELECT * FROM produit WHERE id_produit = ? ";
        $resultat = $this -> getDb() -> fetchAssoc($requete, array($id));
        //resultat : Contient toutes les infos du produit sous forme d'un array

        $produit = $this -> buildProduit($resultat);
        //on transforme en objet et on retourne cet objet de la class produit

        return $produit;
    }


    public function findAllByCategorie($categorie)
    {
        // fonction pour récupérer une catégorie parmis les produit
        $req = "SELECT * FROM produit WHERE categorie = ? ";
        $resultat = $this -> getDb() -> fetchAll($req, array($categorie));
        // $resultat = Array multidimentionnel composé d'array

        $produits = array();
        foreach($resultat as $value)
        {
            $id_produit = $value['id_produit'];
            $produits[$id_produit] = $this -> buildProduit($value);
        }
        // $produits est maintenant un array multi composé d'autant d'objet que de produit récupérés par la requête
        return $produits;
    }


protected function buildProduit(array $value){// l'objectif de cette fonction est de transformer un array contenant toutes les info de la class en un objet de la class Entity/Produit
        $produit = new Produit; // Notre POPO qu'on a créé avec ses getter et setter

        $produit -> setId_Produit($value['id_produit']);
        $produit -> setReference($value['reference']);
        $produit -> setCategorie($value['categorie']);
        $produit -> setTitre($value['titre']);
        $produit -> setDescription($value['description']);
        $produit -> setCouleur($value['couleur']);
        $produit -> setTaille($value['taille']);
        $produit -> setPublic($value['public']);
        $produit -> setPhoto($value['photo']);
        $produit -> setPrix($value['prix']);
        $produit -> setStock($value['stock']);

        return $produit;

        // On a transformer un array qui contient toutes les infos d'un produit en un objet qui contient toutes les infos du produit et on a renvoyer cette objet ensuite.

    }

}





 ?>
