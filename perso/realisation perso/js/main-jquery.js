$(function(){
    var sliders = $(".slider-wrapper");

    sliders.each(function(){
        //pour chaques éléments contenu dans le tableau sliders
        var container = $(this).find(".slide-container"); // contient l'enfant .slide-container du slider

        var slides = $(this).find(".slide"); // contient la liste des éléments .slide qui sont dans le sliders

        var containerWidth = slides.length * 400;

        container.css("width", containerWidth);// initialisation du slider a 0

        // on ajoute les écouteurs d'évènements pour gérer la navigation
        $(this).find(".btn-prev").on("click", function(e){
            e.preventDefault();
            //alert('backward');
            if(container.position().left < 0){
            container.animate({"left": "+=400"});
        }
        });

        $(this).find(".btn-next").on("click", function(e){
            e.preventDefault();
            //alert('forward');
            if(container.position().left > -(slides.length-1)*400){
            container.animate({"left": "-=400"});
        }

        });


    });
});
