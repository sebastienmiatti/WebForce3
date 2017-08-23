$(function(){
    var columnWidth = $("#wrapper").width() / 5; // on récupère la largeur en px de 20% du conteneur

    var grid = $("#wrapper").masonry({itemSelector : ".item", columnWidth : columnWidth, transitionDuration : 0});// init Masonry

        grid.imagesLoaded().progress(function(){ // fonction de callback qui est appelée à chaque chargement d'une image dans le conteneur
            grid.masonry("layout"); // recalcule la mise en page de la grille

        });

                // options...
});
