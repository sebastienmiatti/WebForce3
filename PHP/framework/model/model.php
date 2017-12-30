<?php
class Model
{
    // Au moment de l'instanciation, on va se connecter a la BDD (new PDO), grace aux infos stocké dans $user, $database, $password.
    // on en profite également pour enregistré dans $table le nom de la table a interrogé et dans $pdo notre connexion a la BDD
        public $pdo;
        public $table;
        public $attributes = [];
        public $database = 'contact';
        public $user ='root';
        public $password = '';
        public $is_new = true;

        public function __construct($table)
        {
            // Instanciation de PDO, stockage dans $this->pdo.
            $this->pdo = new PDO('mysql:host=localhost;dbname=' . $this->database,
            $this->user,
            $this->password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
            $this->table = $table;
        }

        // __set et __get sont des méthodes magiques qui permmettent de récupéré des infos liées a l'affectation ou a lutilisation de variables nexistant pas ou créé a la vollées (prenom, nom, phone)
        // puisse que ces variables nexiste pas , onb les stockes dans $âttributes qui est un array

        public function __set($key, $value)
        {
            $this->attributes[$key] = $value;
        }

        public function __get($key)
        {
            return $this->attributes[$key];
        }

        public function save()
        {
            if($this->is_new){ // si new est true alors on enregistre un contact, sinon on modifie un contact existant.

                // la requete INSERT INTO, va récupérer toutes les variables crées a la volée et stockées dans la variable $attributes, pour en faire une requete dynamiques.
                // Pour que cela fonctionne il faut absoluement que les name des champs du formulaire correspondent aux names des champs de la BDDs
            // INSERT INTO contacts (nom, prenom, phone) VALUES (:nom, :prenom, :phone)
            $query = 'INSERT INTO '
            . $this->table
            . ' ('
            . implode(', ', array_keys($this->attributes))
            .') VALUES (:'
            . implode(', :',array_keys($this->attributes))
            . ')';
            $this->execute($query, $this->attributes);
            $this->id = $this->pdo->lastInsertId();
            }else{
                // requete Update... $query contacts SET prenom = :prenom, nom= :nom, phone= :phone;
                $query = 'UPDATE ' . $this->table . ' SET ';
                foreach($this->attributes as $key => $attribute){
                    $query .= $key . ' = :' . $key . ', ';
                }
                $query= substr($query, 0, strlen($query) - 2);
                dd($query);
                $query .= ' WHERE id = :id';
                $this->execute($query, $this->attributes);
            }
        }

        public function execute($query, $params = [], $query_type = '')
        {
            $statement=$this->pdo->prepare($query);
            foreach($params as $key => &$param){
                if(is_null($param)){
                    $type = PDO::PARAM_NULL;
                }else if(is_bool($param)){
                    $type = PDO::PARAM_BOOL;
                }else if (is_int($param)){
                    $type = PDO::PARAM_INT;
                }else{
                    $type = PDO::PARAM_STR;
                }
                $statement->bindParam($key,$param,$type);
            }
            $q = $statement->execute();
            if($query_type == 'all'){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        elseif($query_type == 'select'){
        $this->attributes = $statement->fetch(PDO::FETCH_ASSOC);
        $this->is_new = false;
            }
            return $q;
        }

        public function all()
        {
            $query = 'SELECT * FROM ' . $this->table;
            return $this->execute($query,[], 'all');
        }

        public function find($id)
        {
            $this->execute("SELECT * FROM ". $this->table . ' WHERE id = :id', ['id' => $id], 'select');
        }

        public function delete($id)
        {
            $this->execute('DELETE FROM ' . $this->table . ' WHERE id = :id', ['id'=> $id]);
        }
}
$contact = new Model('contacts');
$contacts = $contact->all();
//dd($contacts);

// $model = new Model('contacts');
// $model->execute('INSERT INTO contacts (prenom, nom, phone) VALUES (:prenom, :nom, :phone)',[
//     ':prenom' => 'Nicolas',
//     ':nom' => 'Coulange',
//     ':phone' => '06 86 63 32 00'
// ]);
//
//
// $contact = new Model('contacts');
?>
