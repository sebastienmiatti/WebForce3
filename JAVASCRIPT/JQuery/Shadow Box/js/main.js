$(function(){
    var sliders = $("#thumbnail-wrapper");

    sliders.each(function(){
        //pour chaques éléments contenu dans le tableau sliders
        var container = $(this).find("#thumbnail-wrapper"); // contient l'enfant .slide-container du slider

        var slides = $(this).find(".slide"); // contient la liste des éléments .slide qui sont dans le sliders

        var containerWidth = slides.length * 300;

        var isMoving = false; // variable de blocage pour savoir si l'animation est en cours ou non

        container.css("width", containerWidth);// initialisation du slider a 0

        // on ajoute les écouteurs d'évènements pour gérer la navigation
        $(this).find("#thumbnail-wrapper").on("click", function(e){
            e.preventDefault();
            //alert('backward');
            if(container.position().left < 0 && !isMoving){
                isMoving = true; //l'animation commence
            container.animate({"left": "+=300"}, function(){
                //fonction de callback de la fonction animate
                //alert('fini');
                isMoving = false; // l'animation est terminée

            });
        }
        });

        $(this).find("btn-next").on("click", function(e){
            e.preventDefault();
            //alert('forward');
            if(container.position().left > -(slides.length-1)*300 && !isMoving){
                isMoving = true;
            container.animate({"left": "-=300"},  function(){
                //fonction de callback de la fonction animate
                //alert('fini');
                isMoving = false;

            });
        }

        });


    });
});
