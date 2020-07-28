console.log("JS2 détail recette en cours de chargement");

var quantite = document.getElementById("quantite");
var plus = document.getElementById("plus");
var moins = document.getElementById("moins");

plus.addEventListener("click", event => {
    quantite.innerHTML = parseInt(quantite.innerHTML)+1; });
moins.addEventListener("click", event => {
    if(quantite.innerHTML != 1) {
    quantite.innerHTML = parseInt(quantite.innerHTML)-1; 
    }
    else {
        quantite.innerHTML = 1;
    }});

let personnes = document.querySelectorAll("span.personnes");
for (let personne of personnes) {
    console.log(personne.innerHTML);
}

