console.log("JS détail recette en cours de chargement");

// Ajout de la recette

var titreRecette = document.getElementById("titre").innerHTML;
var boutonAjout = document.getElementById("ajouter");

boutonAjout.addEventListener("click", event => {
    window.localStorage.setItem("plat", titreRecette); 
    window.localStorage.setItem(titreRecette, quantite.innerHTML);
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
    for (let i = 0 ; i<personnes.length; i++) {
        personnes[i].innerHTML = parseInt(masque[i].innerHTML)*parseInt(quantite.innerHTML);
    }});
moins.addEventListener("click", event => {
    if(quantite.innerHTML != 1) {
    quantite.innerHTML = parseInt(quantite.innerHTML)-1; 
    for (let i = 0 ; i<personnes.length; i++) {
        personnes[i].innerHTML = parseInt(masque[i].innerHTML)*parseInt(quantite.innerHTML);
    }
}
    else {
        quantite.innerHTML = 1;
    }});




