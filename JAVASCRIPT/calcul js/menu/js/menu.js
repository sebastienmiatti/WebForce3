window.onload = function () {
    // on recupère une liste d'élements par leur n om de balise
    var links = document.getElementsByTagName("a");

    //on change la couleur du troisieme elements du tableau links
    links[2].style.color = "darkred";

    // recupère une liste d'éléments par leur classe
    var activeLinks = document.getElementsByClassName("active-link");

    activeLinks[0].style.color = "";

    // on ajoute une class au premier lien
    links[0].className += " test";

    // on ajoute une class au second lien
    links[1].classList.add("test");

    //on récupère le dernier élement du tableau links
    var LastLink= links[links.length - 1];

    //vérifie que LastLink à la classe active-Link
    console.log(LastLink.classList.contains("active-link"));

    //on supprime une class au dernier lien
    LastLink.classList.remove("active-link");

    console.log(LastLink.classList.contains("active-link"));

    //on ajoute une class si elle n'est pas présente, on la supprime sinon
    links[2].classList.toggle("test"); // on supprime la class
    links[3].classList.toggle("test"); // on ajoute la class

    // selectionne le premier élement qui correspond au selecteur
    var elem = document.querySelector(".active-link");

    // selectionne tous les elements qui correspondent au selecteur
    var elems= document.querySelectorAll(".active-link");

    // créé un nouvel éléments
    var newLink = document.createElement("a");
    newLink.href= "#";
    newLink.textContent = "Nouveau Lien";

    // insère l'élement dans le body (à la fin)
    document.body.appendChild(newLink);
    var nav = document.getElementById("main-nav");

    //insère l'élement avant l'élement nav
    document.body.insertBefore(newLink, nav);

    //insère un élément apres un autre éléments
    document.body.appendChild(newLink, nav);

    //récupere l'élement directement apres
    console.log(newLink.nextSibling);
}
