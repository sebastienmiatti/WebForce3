function toggleBackgroundColor(color){
    document.body.style.backgroundColor = color;
    document.body.style.color = "#fff";
    document.getElementById("btn-blue").style.color = "#fff";
     var newParagraph = document.createElement("p");
     newParagraph.innerHTML = "<strong>Du texte ici </strong>";
     document.body.appendChild(newParagraph);
}



window.onload = function () {
    var blueButton = document.getElementById("btn-blue");

    blueButton.addEventListener("click", function(){
        toggleBackgroundColor ("blue");

    });

}
