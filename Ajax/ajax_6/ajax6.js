document.addEventListener("DOMContentLoaded", function(event){
    document.getElementById("submit").addEventListener('click',function(event){

        ajax();
    });
function ajax(){
    r = new XMLHttpRequest();

    r.open("POST", "ajax6.php", true); // on prepare le fichier PHP afin d'envoyer le prenom dont on souhaite afficher les informations

    r.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // la méthode setRequestHeader()  définit la valeur d'un en-tête de requete HTTP
    //définit une propriété d'entête pour l'envoi au serveur de la requete AJAX.
    //Doit etre appelé apres open() et avant send()

    r.send(); // on donne le feu vert pour récupérer des données via le fichier PHP.


    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var obj = JSON.parse(r.responseText);
            console.log(obj);
            document.getElementById("resultat").innerHTML = obj.monresultat;
        }

    }
};
