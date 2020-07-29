console.log("JS du menu en cours de chargement");

// Suppression du type de repas (si l'utilisateur change d'avis)
localStorage.removeItem("repas");
localStorage.removeItem("jour");

// Ajout du type de repas
for (let i = 1 ; i<8; i++) {
    var dejeuner = Array();
    dejeuner[i] = document.getElementById("dejeuner"+i);
    dejeuner[i].addEventListener("click", event => {
        window.localStorage.setItem("repas", "dejeuner");
        window.localStorage.setItem("jour", i);
    });
}
for (let i = 1 ; i<8; i++) {
    var diner = Array();
    diner[i] = document.getElementById("diner"+i);
    diner[i].addEventListener("click", event => {
        window.localStorage.setItem("repas", "diner");
        window.localStorage.setItem("jour", i);
    });
}

// Publication du repas choisi
for (let i = 1 ; i<8; i++) {
    let platdiner= Array();
    let platdejeuner= Array();
    platdiner[i] = document.getElementById("platdiner"+i);
    platdejeuner[i] = document.getElementById("platdejeuner"+i);
    if (localStorage.getItem("repas - diner - "+i)) {
        let image = localStorage.getItem("image - diner - "+i);
        let recette = localStorage.getItem("plat - diner - "+i);
        let personnes = localStorage.getItem("personnes - diner - "+i);
        platdiner[i].innerHTML = recette + " - " + personnes + " personne(s)";
        platdiner[i].setAttribute("style", "background-image: url(../assets/img/recettesImg/" + image + ");background-repeat: no-repeat; background-size: cover");
    }
    if (localStorage.getItem("repas - dejeuner - "+i)) {
        let image = localStorage.getItem("image - dejeuner - "+i);
        let recette = localStorage.getItem("plat - dejeuner - "+i);
        let personnes = localStorage.getItem("personnes - dejeuner - "+i);
        platdejeuner[i].innerHTML = recette + " - " + personnes + " personne(s)";
        platdejeuner[i].setAttribute("style", "background-image: url(../assets/img/recettesImg/" + image + ");background-repeat: no-repeat; background-size: cover");
    }
}