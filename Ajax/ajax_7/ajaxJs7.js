// fonction permettant d'executer la fonction ajax() toute les 10secondes pour afficher les employés de manieres actualisé
setInterval("ajax()", 1000);

ajax(); // execution de la methode ajax() immédiatement  pour ne pas attendre 10 secondes lors du 1er affichage de la page.

function ajax()
{
    r = new XMLHttpRequest();
    //console.log(r);
    //document.write('test<br>');

    r.open("POST", "ajaxJs7.php", true); // on prépare le fichier PHP auquel on envoie des informations

    r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    r.send(); // on donne le feu vert

    r.onreadystatechange = function()
    {
        if(r.readyState == 4 && r.status == 200)
        {
            var obj = JSON.parse(r.responseText);
            document.getElementById("monresultat").innerHTML = obj.monresultat;
        }
    }

}
