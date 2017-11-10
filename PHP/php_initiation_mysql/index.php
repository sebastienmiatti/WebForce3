<?php
echo "Hello World";

//commentaires
/*
commentaires1
commentaires2
*/
################
##COMMENTAIRES##
################

##################
##LES VARIABLES##
#################

//camelCase
$ageDuCapitaine = 27;
//underscore
$age_du_capitaine = 58;

$nom = "Miatti";
$prenom = "Sébastien";

//echo " <br>Bonjour ".$nom." ".$prenom; // concaténation par un point

//echo " le capitaine ".$prenom." à ".$ageDuCapitaine." ans";


// le symbole de concaténation est le point
echo " le capitaine ".$prenom." à ".$ageDuCapitaine." an";
if ($ageDuCapitaine>1){
    echo "s";
}
// condition en forme ternaire
echo "<br>Le capitaine a ". $ageDuCapitaine;
echo ($ageDuCapitaine>1) ? "ans" : "an";



#################
##LES TABLEAUX##
################

// déclarer un tableau vide
$table = array();
//soit
$table = [];

$table = array('Sebastien','Karim','geraldine');

// pour accéder à un élément d'un tableau
echo "<br>".$table[2];

// pour connaitre le nombre d'éléments d'un tableau
echo "<br> le tableau a".count($table)."élément(s)";

// lister le contenu du tableau avec une boucle for
for($i=0; $i<count($table); $i++){
    echo "<br>".$table[$i];
    //echo "<br>".$i;
}

//$i = 0;
//while($i<count($table)){echo $table[$i];$i++};


//lister avec un foreach

$couleurs = array('rouge','jaune','vert');
foreach($couleurs as $couleur){
    echo '<br>'.$couleur;
}

#######################
## Les tableaux index##
#######################

$armoire = array('pantalon'=>5, 'chemise'=>7, 'robe'=>7);
// pour accéder à un élément
echo "<br>".$armoire['robe'];

//pour ajouter un élément
$armoire['costume'] = 1;
//pour modifier un élement
$armoire['pantalon'] = 8;

//lister tout les élements de mon tableaux
foreach($armoire as $nomEtagere => $nombreVetements){echo "<br>".$nomEtagere." : ".$nombreVetements;
}

// en mode débugage, pour voir tout le contenu d'un tableaux
echo "<pre>";
print_r($armoire);
echo "</pre>";

echo "<pre>";
var_dump($armoire);
echo "</pre>";


$employes = array(
                array('nom'=>"Bouffay",'age'=>44),
                array('nom'=>"Titi",'age'=>24),
                array('nom'=>"Toto",'age'=>26)

);

foreach($employes as $employe){
    echo '<br>';
    foreach($employe as $key => $value){
        echo $key."-->".$value." ";
    };
}

// si on veut le nom du premier employé
echo "<br>".$employes[0]['nom'];


// je veut l'age du dernier employés de mon tableaux
echo "<br>".end($employe)." ans";
echo "<br>".$employes[count($employes)-1]['age'];

?>
