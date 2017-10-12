document.addEventListener("DOMContentLoaded", function(event){
    document.getElementById("submit").addEventListener('click',function(event){
        event.preventDefault(); // annule le comportement par defaut du submit qui es censé recharger la page
        ajax();
    });


    function ajax(){
        r = new XMLHttpRequest();
        var p = document.getElementById('personne'); // on cible le champs input grâce a l'id
        //console.info(p);
        var personne = p.options[p.selectedIndex].text; // permet de récupérer la valeur de l'input
        //console.info(personne);

        var parameters = "personne="+personne;// prepare les parametres a envoyer a la requete SQL
        console.log(parameters);

        r.open('POST', 'ajax4.php', true); // prepare le fichier php

        r.setRequestHeader('Content-type', "application/x-www-form-urlencoded"); // prédéfini la requete avant exécution

        r.send(parameters); // on donne le feu vert la requete peut etre envoyé et exécuté.

        r.onreadystatechange = function(){
            if(r.readyState == 4 && r.status == 200){
                var obj = JSON.parse(r.responseText);
                console.log(obj);
                document.getElementById("resultat").innerHTML = obj.monresultat;
            }
        }
    }

});
