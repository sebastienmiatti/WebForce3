<?php
trait TPanier
{
    public $nbProduit = 1;
    public function affichageProduits()
    {
        return 'Affichage des produits.';
    }
}

trait TMembre
{
    public function affichageMembre()
    {
        return 'Affichage des membres';
    }
}

class Site
{
    use TPanier, TMembre;
}

$site = new Site;
echo $site->affichageMembre();
