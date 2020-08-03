// PRISE EN COMPTE DU FILTRE DANS LA LISTE DES RECETTES
var filtre = window.localStorage.getItem("typePlat");
localStorage.removeItem("typePlat");

// GESTION DE LA LISTE DE COURSES

var nbreIngredientsRepas = [];
var tableauQuantiteIngredients = [];
var tableauNomIngredients = [];
var tableauPersonnesDejeuner = [];

for (j=1; j<8; j++) {
    nbreIngredientsRepas.push({jour: j, nbIngredients: window.localStorage.getItem("nbreIngredients - dejeuner - " + j), repas: "dejeuner", nbPersonnes: window.localStorage.getItem("personnes - dejeuner - " + j) });
    nbreIngredientsRepas.push({jour: j, nbIngredients: window.localStorage.getItem("nbreIngredients - diner - " + j), repas: "diner", nbPersonnes: window.localStorage.getItem("personnes - diner - " + j) });
}

for (i=0; i<nbreIngredientsRepas.length; i++) {
    var elementTabIngredients = nbreIngredientsRepas[i];
    if (elementTabIngredients.nbIngredients != null) {
        var jour = elementTabIngredients.jour;
        var repas = elementTabIngredients.repas;
        var personnes = elementTabIngredients.nbPersonnes;
        for (k=0; k<elementTabIngredients.nbIngredients; k++) {
            tableauQuantiteIngredients.push(parseInt(window.localStorage.getItem("quantiteIngredientParPersonne" + k + " - " + repas + " - " + jour))*parseInt(personnes));
            tableauNomIngredients.push(window.localStorage.getItem("nomIngredient" + k + " - " + repas + " - " + jour));
        }
    }
}

var listeIngredients = {};

for (a=0; a<tableauNomIngredients.length; a++) {
    var nomIngredient = tableauNomIngredients[a];
    if (nomIngredient in listeIngredients) {
        listeIngredients[nomIngredient] += parseInt(tableauQuantiteIngredients[a]);
    }
    else {
        listeIngredients[nomIngredient] = parseInt(tableauQuantiteIngredients[a]);
    }
}
var codeHTML = "<form class='was-validated'><div id='affichage-liste-course'>";

for (var ingredient in listeIngredients) {
    codeHTML += `
            <div class='custom-control custom-checkbox mb-3'>
                <input type="checkbox" class="custom-control-input" id="${ingredient}" required>
                <label class="custom-control-label" for="${ingredient}">${listeIngredients[ingredient]} ${ingredient} </label>
                <div class="invalid-feedback">le produit n'est pas validé</div>
            </div>
    `
}
codeHTML += "</div></form>";
