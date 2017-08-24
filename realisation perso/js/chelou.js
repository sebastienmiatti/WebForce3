// var a = {
//     prop1: "toto"
// };
// var b = Object.create(a);
// b.prop2 = "titi";
// var c = Object.create(b);
// c.prop3 = "tutu";
// console.log(c.prop1);

var chaine = "xoxxooxoxxxoooo";
var x = 0;
var o = 0;
for (var i = 0; i < chaine.length; i++) {
    if (chaine[i] === "x") {
        x++;
    } else if (chaine[i] === "o") {
        o++;
    }
}
if (x !== o) {
    console.log("Faux");
} else {
    console.log("Vrai");
}