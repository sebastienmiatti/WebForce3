// windows.onload = function () {
//         var j= "bonjour"
//         var i = prompt('Entrez bonjour');
//         if( i === j ){
//         alert("Bienvenu albertine");
// }
//         else {
//                 alert('erreur');
//             }
// };



// correction

window.onload = function (){
        // tout le Js ici

        // on recupere l'élément input
        var myField = document.getElementById("field");

        // on recupère le formulaire
        var myForm = document.getElementById("my-form");

        //on ajoute l'écouteur sur d'évènement sur l'envoi du formulaire
        myForm.addEventListener("submit", function (e) {
                // on bloque l'évènement par defaut de l'évenement
                e.preventDefault();

                alert(1);
        });
};
