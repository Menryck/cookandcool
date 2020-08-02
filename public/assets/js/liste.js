// PRISE EN COMPTE DU FILTRE DANS LA LISTE DES RECETTES
var filtre = window.localStorage.getItem("typePlat");
localStorage.removeItem("typePlat");

// GESTION DE LA LISTE DE COURSES
// // stockage des données à afficher CODE V1
// var tableauNomIngredientsDejeuner = [];
// var tableauQuantiteIngredientsDejeuner = [];
// var tableauUniteIngredientsDejeuner = [];
// var tableauPersonnesDejeuner = [];

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
        console.log(elementTabIngredients.nbIngredients);
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


// var tableauNomIngredientsDiner = []; CODE V1
// var tableauQuantiteIngredientsDiner = [];
// var tableauUniteIngredientsDiner = [];
// var tableauPersonnesDiner = [];

// // cas du déjeuner
// for (j=0; j<7; j++) {
//     // j = nombre de jours (7 max)
//     if (window.localStorage.getItem("personnes - dejeuner - " + j) != null) {
//         // on conserve le nombre de personnes par jour (et on convertir en nombre)
//         tableauPersonnesDejeuner.push(window.localStorage.getItem("personnes - dejeuner - " + j));
//         // le jour 1 devient la position 0 du tableau, on enlève donc 1 à j
//         tableauPersonnesDejeuner[j] = parseInt(tableauPersonnesDejeuner[j]);
//     };
//     for (i=0; i<20; i++) {
//         // i = nombre d'ingrédients par jour (on fait une boucle sur 20 pour être large)
//         if (window.localStorage.getItem("nomIngredient" + i + " - " + "dejeuner" + " - " + j) != null 
//         && window.localStorage.getItem("quantiteIngredientParPersonne" + i + " - " + "dejeuner" + " - " + j) != null) {
//             tableauQuantiteIngredientsDejeuner.push(window.localStorage.getItem("quantiteIngredientParPersonne" + i + " - " + "dejeuner" + " - " + j));
//             tableauNomIngredientsDejeuner.push(window.localStorage.getItem("nomIngredient" + i + " - " + "dejeuner" + " - " + j));
//             tableauUniteIngredientsDejeuner.push(window.localStorage.getItem("uniteIngredient" + i + " - " + "dejeuner" + " - " + j));
//         };
//         // pour chaque jour, on convertit en nombre la quantité par ingrédient et on la multiplie par les personnes
//     // for (i=0; i<tableauQuantiteIngredientsDejeuner.length; i++) {
//         // console.log(tableauQuantiteIngredientsDejeuner[i]);
//     //     tableauQuantiteIngredientsDejeuner[i] = parseInt(tableauQuantiteIngredientsDejeuner[i]);
//     //     tableauQuantiteIngredientsDejeuner[i] = tableauQuantiteIngredientsDejeuner[i]*tableauPersonnesDejeuner[j-1];
//     //     console.log(tableauQuantiteIngredientsDejeuner[i]);
//     // };
//     };  
// };

// // on additionne la quantité des doublons (et on supprime ensuite les valeurs surnuméraires)
// for (i=tableauNomIngredientsDejeuner.length; i>0; i--) {
//     // on fait deux boucles qui se déclenchent avec un intervalle de 1 pour comparer toutes les données entre elles
//     for (j=0; j<tableauNomIngredientsDejeuner.length; j++) {
//         if (tableauNomIngredientsDejeuner[i] == tableauNomIngredientsDejeuner[j]) {
//             // on ne prend en compte que les valeurs communes
//             if (isNaN(tableauQuantiteIngredientsDejeuner[i]) != true && isNaN(tableauQuantiteIngredientsDejeuner[j]) != true) {
//             tableauQuantiteIngredientsDejeuner[j] = parseInt(tableauQuantiteIngredientsDejeuner[j]) + parseInt(tableauQuantiteIngredientsDejeuner[i]);
//             tableauQuantiteIngredientsDejeuner.splice(i, 1);
//             tableauNomIngredientsDejeuner.splice(i, 1);
//             tableauUniteIngredientsDejeuner.splice(i, 1);
//             };
//         };
//     };
// };



// publication finale des données CODE V1
        //     for (j=0; j<7; j++) {                
        //         for (i=0; i<tableauNomIngredientsDejeuner.length; i++) {
        //             if (tableauNomIngredientsDejeuner[i] != null && tableauPersonnesDejeuner) {
        //                 if (isNaN(tableauQuantiteIngredientsDejeuner[i]*tableauPersonnesDejeuner[j]) != true) {
        //                     document.write(`
        //                     <form class="was-validated" data-index="${i} - ${j}"><div class="custom-control custom-checkbox mb-3">
        //                     <input type="checkbox" class="custom-control-input" required>
        //                     <label>`
        //                     + tableauQuantiteIngredientsDejeuner[i] + tableauUniteIngredientsDejeuner[i] + " " + tableauNomIngredientsDejeuner[i] +
        //                     `</label></div></form>`);
        //                 };
        //             };
        //     };
        // };
