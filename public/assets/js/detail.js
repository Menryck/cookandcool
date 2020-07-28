console.log("JS détail recette en cours de chargement");

let personnes = document.querySelectorAll("span.personnes");
for (let personne of personnes) {
    $nombre = personne.innerHTML;
    personne.innerHTML = $nombre
}

