<?php

class Vehicule
{
    public $vitesseMax;
    public $nbreRoue;
    public $etat;
    public $couleur;
    public $marque;
    public $nbrePlace;

    public function demarrer()
    {

    }

    public function turnRight()
    {

    }

    public function turnLeft()
    {

    }

    public function ouvrir()
    {

    }

    public function fermer()
    {

    }

    public function allumerMusic()
    {

    }

}

class Bateau extends Vehicule
{

}

class Voiture extends Vehicule
{

}

$mercedes = new Voiture();
$mercedes -> demarrer();
$mercedes -> turnRight();

$cadillac = new Voiture();
$cadillac -> uTurn;





 ?>
