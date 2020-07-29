console.log("JS détail recette en cours de chargement");

// Ajout de la recette

var titreRecette = document.getElementById("titre").innerHTML;
var boutonAjout = document.getElementById("ajouter");

boutonAjout.addEventListener("click", event => {
    window.localStorage.setItem("plat", titreRecette); 
    window.location.href = "../../menu/jours";
});



// Gestion du nombre de personnes

var quantite = document.getElementById("quantite");
var masque = document.getElementsByClassName("masque");
var plus = document.getElementById("plus");
var moins = document.getElementById("moins");
var personnes = document.querySelectorAll("span.personnes");

plus.addEventListener("click", event => {
    quantite.innerHTML = parseInt(quantite.innerHTML)+1; 
    for (let personne of personnes) {
        personne.innerHTML = parseInt(masque.innerHTML)*parseInt(quantite.innerHTML);
    }});
moins.addEventListener("click", event => {
    if(quantite.innerHTML != 1) {
    quantite.innerHTML = parseInt(quantite.innerHTML)-1; 
    for (let personne of personnes) {
        personne.innerHTML = parseInt(masque.innerHTML)*parseInt(quantite.innerHTML);
    }
}
    else {
        quantite.innerHTML = 1;
    }});




