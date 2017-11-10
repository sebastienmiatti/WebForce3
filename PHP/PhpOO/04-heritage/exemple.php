<?php
class Membre
{
  public $id = 15;
  public $pseudo;
  public $mdp;

  public function __construct()
  {
    echo 'Internaute créé <hr>';
  }

  public function inscription()
  {
    return 'je m\'inscris.<br>';
  }

  public function connexion()
  {
    return 'je me connecte.<br>';
  }

}

class Admin extends Membre
{
  public function accesBackOffice()
  {
    return 'Accès back office<br>';
  }

}

$admin = new Admin;

echo $admin->connexion();
echo $admin->accesBackOffice();
echo $admin->id;




?>
