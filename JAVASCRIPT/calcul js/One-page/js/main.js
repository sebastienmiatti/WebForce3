$(function(){

        /*************** DECLARATION DES VARIABLES *****************/
        var links = $("#main-nav a");
        var lastScrollPos = $(document).scrollTop(); // on récupère la position du scroll au chargement  de la page


        /**************** DECLARATION DES FONCTIONS*****************/


        /************ DECLARATION DES ECOUTEURS D'EVENEMENT*********/
        links.on("click",function(e){
            e.preventDefault();

            var target = $(this).attr("href"); // récupère la valeur de l'attribut href du lien qui a envoyé l'évènement

            var targetTop = $(target).position().top; // récupère la position verticale de la cible par rapport au document

            //window.scrollTo(0, targetTop);
            //$(document).scrollTop(targetTop);
            //$("body").scrollTop(targetTop);

            $("html, body").animate({scrollTop : targetTop}); //on anime la propriété scrollTop(la distance de la fenêtre à partir du haut du document)
        });

        $(document).on("scroll", function(e){
            if($("html, body").is(":animated") == false) {
                var pageIndex = $(document).scrollTop() / $(window).height();

                if($(document).scrollTop() > lastScrollPos){
                        //l'utilisateur a défilé vers le bas
                        //alert("en bas");
                        pageIndex = Math.ceil(pageIndex); // arrondit la valeur de pageIndex à l'entier supérieur
                        //alert("pageIndex");

        }else{
                //l'utilisateur à défilé vers le haut
                //alert("en haut");
                pageIndex = Math.floor(pageIndex); // arrondit la valeur de pageIndex à l'entier inférieur
                //alert("pageIndex");


        }

        var pagePosition = $(".page").eq(pageIndex).position().top;
        $("html, body").animate({scrollTop : pagePosition}, function(){
                lastScrollPos = $(document).scrollTop(); // on met à jour la dernière position du scroll
        });


}
});



});


                    /*********** EXECUTION ************/
