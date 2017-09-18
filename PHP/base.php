<h2>Ecriture et Affiche</h2>

<!--Première chose on constate qu'on peut écrire de l'HTML dans un fichier PHP! (l'inverse n'est pas possible) -->

<?php
echo 'bonjour'; // echo est une instruction qui nous permet d'effectuer un affichage.
echo '<br>'; // nous pouvons également générer l'affichage HTML grâce a echo.

echo "<h2>Les commentaires</h2>";
echo "texte"; //Ceci est un commentaire sur une ligne
echo "texte"; /* CEci est un commentaire sur plusieurs lignes...*/


echo "<h2>Les variables = Types, déclarations , et affectation :</h2>";

$a = 127; // Affectation de la variables 127 dans la variable a.

//gettype(); // fonction qui retourne le type d'une variable

echo gettype($a); // entier (INTEGER)

$b = 1.5;
echo "<br>".gettype($b); // chiffre à virgule(DOUBLE)

$c = 'chaine de caractères';
echo "<br>".gettype($c); // chaine de caractèes (STRING)

$d = TRUE;
echo "<br>".gettype($d); // boléen (BOOLEAN)

//$ma-super-variable; // le '-' est utiliser pour la soustraction
$ma_super_variable = 1; // OK ! snake_case
$maSuperVariable = 1; // OK ! camelCase
$MaSuperVariable = 1; //

//$prénom = 'sebastien'; // pas d'accent dans les noms de variables
$prenom = 'yakine'; // OK !
$prenom1 = 'jean'; // OK !
//$2prenom = 'charles'; // Erreur : les noms de variables ne peuvent pas commencer par un chiffre.

echo '<h2> La concaténation</h2>';
$x = 'Bonjour';
$y = ' tout le monde !';
echo $x.$y.'<br>'; // on peut traduire le '.' par 'suivi de';
echo "$x $y <br>"; // même chose sans concaténation.

echo 'hey ! ' . $x . $y . '<br>';

echo 'hey ! ' , $x , $y , '<br>'; // la concaténation existe également avec ',' mais est très peu utilisée.


echo'<h2>Concaténation lors de l\'affectation</h2>';
$prenom1 = 'Bruno'; // Affectation de la valeur Bruno.
$prenom1 = 'Claire'; // ré-affection de la valeur Claire qui remplace Bruno.

$prenom2 = 'Nicolas'; // Affectation de la valeur Nicolas.
$prenom2 .= ' Marie'; // ajoute la valeur Nicolas a la valeur Marie
echo $prenom2;

/* Explication:
$prenom2 = $prenom2 . 'Marie';
$prenom2 = 'Nicolas' . 'Marie';
*/

echo '<h2>Guillemets et quotes</h2>';
$jour = "aujourd'hui";
$jour = 'aujourd\'hui'; // Attention, entre quotes, les apostrophe peuvent faire échapper la chaines de caractères.

$txt = 'bonjour';

echo $txt . ' Tout le monde ! <br>';
echo $txt . " Tout le monde ! <br>";

echo "$txt Tout le monde ! <br>";
echo '$txt Tout le monde ! <br>'; // entre quotes les variables ne sont pas évaluées, mais simplement considérées comme des chaînes de caractères.

echo '<h2> Constantes et Constantes magiques</h2>';
 // une constante, tout comme une variable, permet de conserver (stocker) une valeur. la différence se situe dans le fait qu'on ne puisse pas modifier la valeur d'une constante, elle est... CONSTANTE.

define('CAPITALE', 'Paris');
echo CAPITALE . '<br>';

/* define() est la fonction qui nous permet de créer une constante. elle attend deux arguments :
 1 : Le nom de la constante en MAJ (STRING)
 2 : La valeur stockée
 */

// Les constantes magiques:

 echo __DIR__ . '<br>'; // le dossier dans lequel nous sommes
 echo __FILE__ . '<br>'; // le fichier dans lequel nous sommes
 echo __LINE__ . '<br>'; // la ligne dans laquelle nous sommes

 // __FUNCTION__, __CLASS__, __METHOD__

 //exercice :

//1 : Afficher 'Bonjour Sébastien Miatti'
 $prenom = 'Sébastien';
 $nom = 'Miatti';

 //2 : Afficher : 'Bleu - Blanc - Rouge' , en utilisant 3 variables ( une pour chaques couleur) et la concaténation.

$hello = 'Bonjour';

echo $hello. ' ' . $prenom . ' ' . $nom .'<br>';

$couleur1 = '<p style="color:blue">' . $hello . '</p>';
$couleur2 = '<p style="color:yellow">' . $prenom . '</p>';
$couleur3 = '<p style="color:red">' . $nom . '</p>';

echo $couleur1 .' - '. $couleur2 .' - '. $couleur3. '<br>';


echo '<h2>Opérateurs Arithmétiques :</h2>';
$a = 10;
$b = 2;

$cc = "10"; // Chaine de caractère
$chiffre = (int) $cc; // INTEGER 10

$chiffre2 = 125;
$mot = (string) $chiffre2; //'125'

echo $a + $b.'<br>'; // Affiche 12;
echo $a - $b.'<br>'; // Affiche 8;
echo $a * $b.'<br>'; // Affiche 20;
echo $a / $b.'<br>'; // Affiche 5;
echo $a % $b.'<br>'; // Affiche 0;

// Opérations et Affectations
$a += $b; //  A : 12;
$a -= $b; //  A : 10;
$a *= $b; //  A : 20;
$a /= $b; //  A: 10;

echo '<h2>Structures conditionnelles : </h2>';

//empty() : teste si c'est vide, False, ou égal à 0
//isset() : teste si quelque chose existe

$var1 = 0; //false
$var2 = 'Mon prénom';
$var3 = '';

/*if(Condition à tester){

	// instructions à exécuter
}*/

// if, else, elseif
$a = 10;
$b = 5;
$c = 2;

if($a > $b){// Si à est supérieur à B
	echo 'Oui A est supérieur à B <br>';

}
else{// Sinon ( A est inférieur ou égal à B)
	echo 'NonA n\'est pas supérieur à B <br>';
}



if ($a > $b && $b > $c){ // Si A est supérieur à B et que dans le même temps B est supérieur a C
	echo 'Ok pour les deux conditions<br>';
}

if($a == 9 || $b > $c){ // Si A contient la valeur 9 ou B est supérieur à C
	echo 'OK pour au moins une des deux conditions<br>';
}

if($a == 10 XOR $b == 6){// si soit A contient  la valeur 10 ou soit B contient la valeur 6 (condition exclusive)
	echo 'OK pour seulement l\'une des deux conditions';
}

if($a == 8){
	echo 'A contient la valeur 8<br>';
}elseif($a != 10){
	echo 'A est diférent de 10<br>';
}else{
	echo 'A contient la valeur 10 <br>';
}
// =   --> Affectation
// ==  --> Comparaison
// === --> Stricte Comparaison

echo '<h2>La condition switch :</h2>';


$couleur = 'bleu';

switch ($couleur){

	case 'bleu':
		echo 'Vous aimez le bleu <br>';
	break;

	case 'rouge':
		echo 'Vous aimez le rouge <br>';
	break;

	case 'vert':
		echo 'Vous aimez le vert <br>';
	break;

	default :
		echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
	break;

}

// Exercice : faire la même chose avec un if, eslseif(), else...

if($couleur == 'bleu'){
	echo 'Vous aimez le bleu <br>';
}elseif($couleur =='rouge'){
	echo 'Vous aimez le rouge <br>';
}elseif($couleur == 'vert'){
	echo 'Vous aimez le vert <br>';
}else{
	echo 'Vous n\'aimez ni le bleu, ni le rouge, ni le vert <br>';
}

echo '<h2>Fonctions prédédinies</h2>';
// les fonctions prédéfinies existent dans le langages et permettent d'effectuer des traitements spécifiques, ils en existent plusieurs centaines... DOC officielle : php.net

echo date('d/m/y D/M/Y h:i:s'); //Date() nous permet de récupérer la date du jour et attend en argument (STRING) le format pour récupérer la date.
//JJ/MM/AAAA


echo '<h2>Fonctions prédédinies sur les chaînes de caractères</h2>';

$email = 'yakine.hamida@evogue.fr';

echo strpos($email, '@'); // strpos() (string position) nous retourne l'emplacement d'un caractère dans une chaîne de caractères.
/* arguments :
		1 : La cc sur laquelle on travaille
		2 : Le ou les caractère(s) cherchés

	valeur de retour :
		succès : N (INT)
		Echec : False (BOOL)
 */

echo '<br>';

$phrase = 'Il fait pas beau aujourdh\'ui';

echo strlen(utf8_decode($phrase)); // strlen() (string length) nous retourne le nombre de caractères dans une chaines de caractères. Plus précisement cela compte la ressource en nombre d'octets. utf8_decode() ->1caractère = 1 octect.

/*
1 argument : la cc en question

Valeurs de retour:
Succès : N (INT)
Echec : FALSE (Bool)
*/
echo '<br>';

$texte = 'Cyprum itidem insulam procul a continenti discretam et portuosam inter municipia crebra urbes duae faciunt claram Salamis et Paphus, altera Iovis delubris altera Veneris templo insignis. tanta autem tamque multiplici fertilitate abundat rerum omnium eadem Cyprus ut nullius externi indigens adminiculi indigenis viribus a fundamento ipso carinae ad supremos usque carbasos aedificet onerariam navem omnibusque armamentis instructam mari committat.';

echo substr($texte, 0, 40) . '...<a href=""> Lire la suite</a>'; // substr (sub string) nous retourne une partie d'une chaines de caractères.
/*
3 arguments :

1 : la CC
2 : le point de départ
3 : le nombre de caractères (optionnel)

valeur de retour :
succès : XXXXXXX (STR)
Echec : FALSE (BOOL)
*/

echo '<h2>Les Fonctions utilisateurs :</h2>';

// Les fonctions utilisateurs nous permettent d'affectuer des traitements que ne sont pas prédéfinis dans le langage. Elles sont d'abord déclarées puis exécutées.

//1- Fonction pour afficher 'Bonjour' :
// Déclaration :
function bonjour(){
	//Traitements-instruction...
	echo 'Bonjour !';
}


// Exécution :
bonjour();

echo '<br>';
// 2- Fonction pour afficher 'Bonjour Hadi' :
// Déclaration :
function bonjourPrenom($arg){
	echo 'Bonjour ' . $arg . ' !<br>';
	}

// Exécution :
bonjourPrenom('Meryem');
bonjourPrenom('Yakine');
bonjourPrenom('Barbara');
bonjourPrenom('Pascal');

$prenom = 'sara';
bonjourPrenom($prenom);


// 3- Fonction pour afficher un titre H2 :

// Déclaration :
function titre($arg){
	echo '<h2>' . $arg . '</h2>';
}
// Exécution :
titre('');
// 4 : Fonction pour appliquer la TVA à un prix HT :

// Déclaration :
function appliqueTva($prixHt){
	if(is_numeric($prixHt)){
		return $prixHt * 1.2;
	}
}

//Exécution :
$montantHt = 164;

echo 'Le montant de votre commande hors taxes, ' . $montantHt . '€HT revient à' . appliqueTva($montantHt) . '€TTC !<br>';

// Exercice :
// Créer une fonction applique Tva 2, qui va nous retourné un prix TTC, converti soit avec un taux de 20%(1.2) soit 10%(1.1) soit 5.5% (1.055).
// -----> Une fonction peut recevoir 2 arguments ou plus...

function appliqueTva2($prix, $taux = 1.2){

		return $prix * $taux;
	}
$montantHt = 187;
$tva = 1.055;

echo appliqueTva2($montantHt, $tva);



titre('Inclusion de fichier');

// Les inclusions permettent d'inclure des fichiers. Exemple on peut inclure des parties communes d'un site (compartiment_site), on peut également inclure du code PHP.

// include() : si il y a une erreur sur le fichier inclus, cela affiche les erreurs, et continue le script.

// require() : si il y a une erreur sur le ficher inclus, cela affiche les erreurs; et stoppe l'exécution du script.

// include_once() : même include(), mais si le fichier est inclus plusieurs fois il ne l'affichera qu'une seule fois.

// require_once() : même require(), mais si le fichier est inclus plusieurs fois, il ne l'affichera qu'une seule fois.

titre('Structure itérative : Les boucles');

echo '<br>';
echo 'boucle WHILE : <br>';

// BOUCLE WHILE :

$i = 0;
	while ($i < 3){
		//traitement à effectuer
		echo $i . '---';
		$i ++;
	}

// exercice : Faire la même chose qui affiche : 0---1---2

$i = 0;
while ($i < 3){
	echo $i . '---';
	$i ++;
	if($i == 2){
		echo $i ;
		$i++;
	}
}

$i = 0;
while ($i < 3){ /// $i = 0 / $i = 1 / $i = 2
	if($i < 2){ // $i = 0 // $i = 1;
		echo $i . '---';
	}else{  // $i = 2
		echo $i;

	}
	$i++;
}

echo '<br>';
echo 'boucle for : <br>';

// BOUCLE FOR :
for($i = 0; $i < 3; $i++){
	echo $i . '---';
}

// Exercice 1 : Afficher de 0 à 9 grace a une boucle for : (0123456789);
for($n = 0; $n < 10; $n++){
	echo $n . '<br>';
}

echo '<hr>';


// Exercice 2 : Afficher de 0 à 9 dans un tableau
echo '<table border="1">';
echo '<tr>';
for($n = 0; $n < 10; $n++){
	echo '<td>' . $n . '</td>';
}
echo '</tr>';
echo '</table>';

echo '<hr>';
// Exercice 3 : Afficher un tableau avec 10 lignes allant de 0 à 99 chaques ligne ( chaques ligne 0-9 // 10-19 ... 90 à 99).
//$z = 0 ;
echo '<table border="1">';
for($m = 0; $m <= 9; $m++){
echo '<tr>';
for($n = 0; $n <= 9; $n++){
	echo '<td>' . ($m * 10 + $n) /*$z*/. '</td>';
	//$z++;
}
echo '</tr>';
}
echo '</table>';
echo '<hr>';

	// de 0 à 99
//modulo
echo '<br>';
echo '<table border="1">';
echo '<tr>';
for ($i = 0; $i <= 99; $i++){
	if($i%10 == 0){
		echo '</tr><tr>';
	}
	echo '<td>' . $i . '</td>';
}
echo'</tr>';
echo '</table>';

titre('Tableaux de données ARRAY');
// un tableau de données array , est déclaré un peu comme une variable améliorée, car on ne conserve pas qu'une seul valeur mais plusieurs. Les valeurs seront classées...
$liste = array ('Yakine', 'Hadi', 'Meryem', 'Corinne', 'Pascal');

// echo $liste; // Erreur : on ne peux pas faire un echo sur un array.
echo '<pre>';
print_r($liste);
echo '</pre>';

titre('La boucle foreach pour les ARRAY');
// Les boucles foreach sont un moyen simple de passer un revue un tableau de données array. Foreach fonctionne uniquement avec les arrays( et les objets).

$tab[] = 'France';
$tab[] = 'Espagne';
$tab[] = 'Italie';
$tab[] = 'Angleterre';
$tab[] = 'Portugal';

echo '<pre>';
print_r($tab);
echo '</pre>';

echo $tab[2];
$tab[4] = "Suisse";
$tab[] = "allemagne";

echo '<pre>';
print_r($tab);
echo '</pre>';

echo 'Boucle foreach : <br>';
foreach($tab as $valeur){ // foreach se comporte comme un curseur qui va parcourir tous les élements d'un array. le mot AS fait partie du langage et est OBLIGATOIRE. $valeur va contenir a chaque tour de boucle la valeur trouvée dans l'array
	echo $valeur . '<br>';
}
echo'<br>';

foreach($tab as $indice => $valeur){ // s'il y a 2 variables ($indice, $valeur) dans les paramètres de la boucles foreach, le premier parcourt les indices et le second parcourt les valeurs.
	echo 'A l\'indice : ' . $indice . ' se trouve la valeur : ' . $valeur . '<br>';
}


// Création d'un array avec indices choisis :
$couleur = array(
	'couleur1' => 'jaune',
	'couleur2' => 'rouge',
	'couleur3' => 'vert',
);

echo '<pre>';
print_r($couleur);
echo '</pre>';


titre('Les tableaux multidimensionnel');

$tab_multi = array(
	0 => array(
		'prenom' => 'Hadi',
		'nom' => 'Smail'
	),
	1 => array(
		'prenom' => 'Meryem',
		'nom' => 'Boularouk'
	)

);

echo '<pre>';
print_r($tab_multi);
echo '</pre>';











































?>
