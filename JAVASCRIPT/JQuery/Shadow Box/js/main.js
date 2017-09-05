$(function(){

         /****** DECLARATION DES VARIABLES ********/
         var slider = $("#slider-wrapper");
         var slideContainer = $("#slide-container");
         var slides = $(".slide");
         var isMoving = false;

        /****** DECLARATION DES FONCTIONS *******/
        var move = function (direction){
                if (direction == "next"){
                        // on vérifie que le conteneur n'est pas positionné sur le dernier élément
                        if(slideContainer.position().left > -(slides.length - 1) * 600 && !isMoving){
                                isMoving = true;
                                slideContainer.animate({"left" : "-=600"}, function(){
                                isMoving = false;
                                });
                        }
                }else {
                        //on vérifie que el contenaur n'est pas positionné sur le premier élément
                        if(slideContainer.position().left < 0 && !isMoving){
                                isMoving = true;
                                slideContainer.animate({"left" : "+=600" }, function(){
                                isMoving = false;
                                });

                        }
                }
        };


        /****** DECLARATION DES ECOUTEURS D'EVENEMENT ******/
         $(".open-slider").on("click", function(e){
                 e.preventDefault();
                 var slideNumber = $(this).data("slide"); // index du slide a afficher
                 // var slideNember = $(this).attr("data-slide");

                 var containerLeft= slideNumber * 600; // calcule la position du slide cible

                 slideContainer.css({"left" : -containerLeft}); // déplace le slider à la position du slide cible

                 $("#shadow").fadeIn();

         });

        $("#shadow").on("click", function(e){
                var target = $(e.target); //récumpère la cible de l'évènement
                if( target.is("#shadow")){ // vérifie si la cible de l'évènement correspond au selecteur #shadow

                        $(this).fadeOut();
                }
        });

        $(".btn-prev, .btn-next").on("click", function(e){
                e.preventDefault();

                var direction = $(this).data("direction");

                move(direction);
        });

        /****** EXECUTION *******/
        var containerWidth = slides.length * 600;
        slideContainer.css({"width" : containerWidth});

});
