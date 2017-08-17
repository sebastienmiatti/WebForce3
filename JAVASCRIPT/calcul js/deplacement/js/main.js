window.onload = function(){
     var myForm = document.getElementById("my-form");
     var leftField = document.getElementById("left");
     var topField = document.getElementById("top");
     var block = document.getElementById("block");
     var timer;

     var move = function (e) {
        e.preventDefault();
        clearInterval(timer); // on supprime l'intervalle s'il existe déjà

        var leftValue = parseFloat(leftField.value);
        var topValue = parseFloat(topField.value);

        if(!Number.isNaN(leftValue) && !Number.isNaN(topValue)){


            //on définit une fonction qui s'exécutera à intervalle régulier de 500 millisecondes
               timer = setInterval(function(){
               var blockPosY = block.offsetTop;// position verticale actuelle du block
               var blockPosX = block.offsetLeft;//position horizontale actuelle du block

               if(topValue > blockPosY){// si la destination est supérieur à l'origine
                  block.style.top = blockPosY + 1 + "px";

               }else if(topValue < blockPosY){
                  block.style.top = blockPosY - 1 + "px";
               }

               if(topValue > blockPosX){// si la destination est supérieur à l'origine
                  block.style.left = blockPosX + 1 + "px";

               }else if(topValue < blockPosX){
                  block.style.left = blockPosX - 1 + "px";
               }


            },50);

            //alert("Y : "+blockPosY+" - X : "+blockPosX);

           //block.style.top = topValue+"px";
          // block.style.left = leftValue+"px";
        }
   }

myForm.addEventListener("submit", move);

}
