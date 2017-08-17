// équivalent de windows.onload = function () {};
$(document).ready(function(){ =// $(function(){})
    $("body").css("background", "red");

        //selectionne un élement, on utilise un selecteur css
        var body = $("body");
        var contentBlock = $("#content");
        var articles = $(".text"); // liste d'éléments

        var firstArticle = articles.eq(0); // selectionne l'élément à l'index 0 de la liste articles
        var parentBlock = firstArticle.parent(); // recupère le parent direct de l'élément firstArticle (contentBlock)

        var childBlocks = contentBlock.children(); // récupère tous les enfants directs de contentBlock

        var paragraph = contentBlock.find("p") //récupère tous les descendants de contentBlock qui correspondent au sélecteur p

        // $("content p") = $("content").find("p")

        var pParent = paragraphe.parents("content"); // récupère tous les parents de paragraphe qui correspondent au sélecteur #content

        var secondArticle = firstArticle.next(); // sélectionne l'élement suivant

        var reFirstArticle = secondArticle.prev(); // sélectionne l'élement précédent



    });
