document.addEventListener("DOMContentLoaded", function(event){
    document.getElementById("submit").addEventListener('click',function(event){
        event.preventDefault(); // annule le comportement par defaut du submit qui es censé recharger la page
        ajax();
    });


    function ajax(){
        r = new XMLHttpRequest();
        var p = document.getElementById('personne'); // on cible le champs input grâce a l'id
        //console.info(p);
        var personne = p.value; // permet de récupérer la valeur de l'input
        //console.info(personne);

        var parameters = "personne="+personne;// prepare les parametres a envoyer a la requete SQL
        console.log(parameters);

        r.open('POST', 'ajax_insert.php', true); // prepare le fichier php

        r.setRequestHeader('Content-type', "application/x-www-form-urlencoded"); // prédéfini la requete avant exécution

        r.send(parameters); // on donne le feu vert la requete peut etre envoyé et exécuté.

        document.getElementById("resultat").innerHTML = "<span style='background: #22d3a7'>employé " + p.value + " ajouté</span>";
    }

});
