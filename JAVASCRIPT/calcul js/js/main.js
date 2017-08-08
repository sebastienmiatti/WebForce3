// commentaire de ligne
/*----  commentaire de blocs
sur plusieur ligne ----*/

        // on attend que le doc soit entièrement chargé
window.onload = function()
{
    var myForm = document.getElementById("my-form")

        //on recupere les champs #number-1 et #number-2
    var number1 = document.getElementById("number-1");
    var number2 = document.getElementById("number-2");
    var resultField = document.getElementById("result-field");

        // on déclare la fonction calculate()
    function calculate(){
            //on recupere la propriété value (le contenu) des champs
        var value1 = parseInt(number1.value, 10);
        var value2 = parseInt(number2.value, 10);

            //on additionne les deux valeurs
        var result = value1 + value2;

            resultField.value = result;

            console.log(result);
} // on execute la fonction calculate
        calculate();
        /*var calculate = function()
        {

        };*/


        //ajout d'un écouteur sur l'évènement "submit" du formulaire
        /*myForm.onsubmit = function ()
        {
        };*/

        //idem
        myForm.addEventListener("submit", function(e)
        {
            //alert("envoi du formulaire");
            // on force le navigateur a resté sur la page à l'envoi
            //return false;
            //on bloque l'envoi du formulaire vers une verification(serveur)
            e.preventDefault();
            calculate();
        });
};
