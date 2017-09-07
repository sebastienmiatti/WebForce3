// alert('coucou');
$(".btnsubmit").on("click", function(){// je cible mon bouton .btnsubmit puis je pose mon écouteur d'évènement .on sur le click et ensuite je code ma fonction

    var nom = $("#oblignom").val();
    // je stocke dans ma variable nom la valeur de l'élément HTML qui a l'ID #oblignom

    var message = $("#msg");

    if(nom === ""){ // si le nom est vide / pas rempli

        // /!\ on manipule des classes de Boostrap : ici je vais rajouter la class .has-error de Boostrap3 a la div ayant la classe form-group la plus proche parente de l'élément #oblignom => résultat si le champ n'est pas rempli son cadre devient rouge
        $("#oblignom").closest("div.form-group").addClass("has-error");

        // je rajoute ensuite la class prévue dans mon css .error sur la div#msg
        message.addClass("error");

        // je stocke dans une variable le message d'erreur que je veux afficher
        var pasDeNom = $(".error"); // ici je cible une class et comme en JS par défaut il renvoie l'information dans un tableau [0, 1, 2, ...]
        var msgPasDeNom = "Vous n'avez pas renseigné votre nom ! ";
        pasDeNom[0].innerHTML += msgPasDeNom
        } // fin du if de vérification du nom

        // si le formumaire est rempli sur tous les champs que je rend obligatoires alors je remplace le formulaire par un message de réussite
        var prenom = $("#obligprenom").val();
        var adresse = $("#obligadresse").val();
        var cp = $("#obligcp").val();
        var telephone = $("#telephone").val();
        var selection = $(".selection").val(); /*PAYS*/

        if(nom !== "" && prenom !== "" && adresse !=="" && cp !=="" && telephone !=="" && selection !== "Pays"){
            var formulaireOk = $("form");
            formulaireOk.addClass("valid");
            var msgOk = "Votre formulaire est validé ;) ! ";
            formulaireOk[0].innerHTML += msgOk;
        }

        // Exercices :
        // j'ai rajouté des vérifications pour les champs prénom et cp
        if(prenom === ""){

            $("#obligprenom").closest("div.form-group").addClass("has-error");

            message.addClass("error");

            var pasDeNom = $(".error");
            var msgPasDeNom = "Vous n'avez pas renseigné votre prénom ! ";
            pasDeNom[0].innerHTML += msgPasDeNom
        }

        if(cp !== "" || cp.length !== 5){ // si je ne mets pas 5 chiffres dans le champs cp j'ai un message d'erreur qui s'affiche

            $("#obligcp").closest("div.form-group").addClass("has-error");

            message.addClass("error");

            var pasDeNom = $(".error");
            var msgPasDeNom = "Le cp n'est pas valide ! ";
            pasDeNom[0].innerHTML += msgPasDeNom
        }
});
