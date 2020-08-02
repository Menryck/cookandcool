// Suppression du type de repas (si l'utilisateur change d'avis)
localStorage.removeItem("repas");
localStorage.removeItem("jour");

// Publication du repas choisi
for (let i = 1 ; i<8; i++) {
    let platdiner= Array();
    let platdejeuner= Array();
    let nomdejeuner= Array();
    let nomdiner= Array();
    platdiner[i] = document.getElementById("platdiner"+i);
    platdejeuner[i] = document.getElementById("platdejeuner"+i);
    nomdejeuner[i] = document.getElementById("nomdejeuner"+i);
    nomdiner[i] = document.getElementById("nomdiner"+i);

    if (localStorage.getItem("repas - diner - "+i)) {
        let image = localStorage.getItem("image - diner - "+i);
        let recette = localStorage.getItem("plat - diner - "+i);
        let personnes = localStorage.getItem("personnes - diner - "+i);
        nomdiner[i].innerHTML = recette + '<br>' + personnes + " personne(s)";
        platdiner[i].setAttribute("style", "background-image: url(../assets/img/recettesImg/" + image + ");background-repeat: no-repeat; background-size: cover");
    }
    if (localStorage.getItem("repas - dejeuner - "+i)) {
        let image = localStorage.getItem("image - dejeuner - "+i);
        let recette = localStorage.getItem("plat - dejeuner - "+i);
        let personnes = localStorage.getItem("personnes - dejeuner - "+i);
        nomdejeuner[i].innerHTML = recette + '<br>' + personnes + " personne(s)";
        platdejeuner[i].setAttribute("style", "background-image: url(../assets/img/recettesImg/" + image + ");background-repeat: no-repeat; background-size: cover");
    }
}

// Cas du déjeuner
for (let i = 1 ; i<8; i++) {
    let dejeuner = Array();
    let liendejeuner = Array();
    let platdejeuner= Array();
    platdejeuner[i] = document.getElementById("platdejeuner"+i);
    dejeuner[i] =  document.getElementById("dejeuner"+i);
    liendejeuner[i] = document.getElementById("liendej"+i);
    if (localStorage.getItem("repas - dejeuner - "+i) == null) {
        dejeuner[i].setAttribute("src", "../assets/img/iconPng/plus.png");
        dejeuner[i].setAttribute("alt", "Ajouter un déjeuner");
        dejeuner[i].setAttribute("data-etat", "valider");
        liendejeuner[i].setAttribute("href", "../type");
    }
    else if (localStorage.getItem("repas - dejeuner - "+i) == "dejeuner") {
        dejeuner[i].setAttribute("src", "../assets/img/iconPng/croix.png");
        dejeuner[i].setAttribute("alt", "Supprimer cette recette");
        dejeuner[i].setAttribute("data-etat", "supprimer");
        liendejeuner[i].removeAttribute("href");
    }
        // ajout d'un plat
    liendejeuner[i].addEventListener("click", event => {
        if (dejeuner[i].getAttribute("data-etat") == "valider") {
            window.localStorage.setItem("repas", "dejeuner");
            window.localStorage.setItem("jour", i);
        }
        // retrait d'un plat
        else if (dejeuner[i].getAttribute("data-etat") == "supprimer") {
            localStorage.removeItem("image - dejeuner - "+i);
            localStorage.removeItem("plat - dejeuner - "+i);
            localStorage.removeItem("personnes - dejeuner - "+i);
            localStorage.removeItem("jour - dejeuner - "+i);
            localStorage.removeItem("repas - dejeuner - "+i);
            localStorage.removeItem("idRecette - dejeuner - "+i);
            var nbreIngredients = localStorage.getItem("nbreIngredients - dejeuner - "+i);
            for (let j = 0 ; j<nbreIngredients; j++) {
                localStorage.removeItem("quantiteIngredientParPersonne"+j+" - dejeuner - "+i);
                localStorage.removeItem("uniteIngredient"+j+" - dejeuner - "+i);
                localStorage.removeItem("nomIngredient"+j+" - dejeuner - "+i);
            }
            localStorage.removeItem("nbreIngredients - dejeuner - "+i);
            platdejeuner[i].innerHTML = "";
            platdejeuner[i].removeAttribute("style");
            document.location.reload(true);
        };
    });
};
            
// Cas du dîner
for (let i = 1 ; i<8; i++) {
    let diner = Array();
    let liendiner = Array();
    let platdiner= Array();
    platdiner[i] = document.getElementById("platdiner"+i);
    diner[i] =  document.getElementById("diner"+i);
    liendiner[i] = document.getElementById("liendin"+i);
    if (localStorage.getItem("repas - diner - "+i) == null) {
        diner[i].setAttribute("src", "../assets/img/iconPng/plus.png");
        diner[i].setAttribute("alt", "Ajouter un dîner");
        diner[i].setAttribute("data-etat", "valider");
        liendiner[i].setAttribute("href", "../type");
    }
    else if (localStorage.getItem("repas - diner - "+i) == "diner") {
        diner[i].setAttribute("src", "../assets/img/iconPng/croix.png");
        diner[i].setAttribute("alt", "Supprimer cette recette");
        diner[i].setAttribute("data-etat", "supprimer");
        liendiner[i].removeAttribute("href");
    }
        // ajout d'un plat
    liendiner[i].addEventListener("click", event => {
        if (diner[i].getAttribute("data-etat") == "valider") {
            window.localStorage.setItem("repas", "diner");
            window.localStorage.setItem("jour", i);
        }
        // retrait d'un plat
        else if (diner[i].getAttribute("data-etat") == "supprimer") {
            localStorage.removeItem("image - diner - "+i);
            localStorage.removeItem("plat - diner - "+i);
            localStorage.removeItem("personnes - diner - "+i);
            localStorage.removeItem("jour - diner - "+i);
            localStorage.removeItem("repas - diner - "+i);
            localStorage.removeItem("idRecette - diner - "+i);
            var nbreIngredients = localStorage.getItem("nbreIngredients - diner - "+i);
            for (let j = 0 ; j<nbreIngredients; j++) {
                localStorage.removeItem("quantiteIngredientParPersonne"+j+" - diner - "+i);
                localStorage.removeItem("uniteIngredient"+j+" - diner - "+i);
                localStorage.removeItem("nomIngredient"+j+" - diner - "+i);
            }
            localStorage.removeItem("nbreIngredients - diner - "+i);
            platdiner[i].innerHTML = "";
            platdiner[i].removeAttribute("style");
            document.location.reload(true);
        };
    });
};
