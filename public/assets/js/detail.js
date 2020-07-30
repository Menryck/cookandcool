// Ajout de la recette

var titreRecette = document.getElementById("titre").innerHTML;
var boutonAjout = document.getElementById("ajouter");

boutonAjout.addEventListener("click", event => {
    let image   = document.getElementById("banniere").getAttribute("data-img");
    let id      = document.getElementById("titre").getAttribute("data-id");
    let repas   = localStorage.getItem("repas");
    let jour    = localStorage.getItem("jour");
    // prise en compte du nom de la recette
    window.localStorage.setItem("plat - " + repas + " - " + jour, titreRecette); 
    // prise en compte de l'id de la recette
    window.localStorage.setItem("idRecette - " + repas + " - " + jour, id); 
    //  prise en compte du nombre de personnes
    window.localStorage.setItem("personnes - " + repas + " - " + jour, quantite.innerHTML);
    window.location.href = "../../menu/jours";
    // prise en compte du type de repas (déjeuner ou dîner)
    window.localStorage.setItem("repas - " + repas + " - " + jour, repas);
    // prise en compte du jour
    window.localStorage.setItem("jour - " + repas + " - " + jour, jour);
    // prise en compte de l'image
    window.localStorage.setItem("image - " + repas + " - " + jour, image);

});

// Gestion du nombre de personnes

var quantite = document.getElementById("quantite");
var mesure = document.getElementsByClassName("personnes");
var plus = document.getElementById("plus");
var moins = document.getElementById("moins");
var personnes = document.querySelectorAll("span.personnes");

plus.addEventListener("click", event => {
    quantite.innerHTML = parseInt(quantite.innerHTML)+1; 
    for (let i = 0 ; i<personnes.length; i++) {
        personnes[i].innerHTML = parseInt(mesure[i].getAttribute("data-mesure"))*parseInt(quantite.innerHTML);
    }});
moins.addEventListener("click", event => {
    if(quantite.innerHTML != 1) {
    quantite.innerHTML = parseInt(quantite.innerHTML)-1; 
    for (let i = 0 ; i<personnes.length; i++) {
        personnes[i].innerHTML = parseInt(mesure[i].getAttribute("data-mesure"))*parseInt(quantite.innerHTML);
    }
}
    else {
        quantite.innerHTML = 1;
    }});




