<?php
class Animal
{
  protected function deplacement()
    {
      return "Je me deplace";
    }

  public function manger()
    {
      return "je mange chaque jour";
    }
}

class Elephant extends Animal
{
  public function quiSuisJe()
  {
    return 'Je suis un elephant et '  . $this->deplacement();' <br>';
  }
}

class Chat extends Animal
{
  public function quiSuisJe()
  {
    return 'je suis un chat';
  }
  public function manger()
  {
    return 'je mange comme un chat';
  }
}

$eleph = new Elephant;
echo 'Elephant : ' . $eleph->manger(). '<br>';
echo 'Elephant : ' . $eleph->quiSuisJe(). '<hr>';

$chat = new Chat;
echo 'chat : ' . $chat->manger() . '<br>';
echo 'chat : ' . $chat->quiSuisJe() . '<hr>';


?>
