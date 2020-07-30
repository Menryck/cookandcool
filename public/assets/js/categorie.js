var categoriePlat = document.getElementsByClassName("categoriePlat");

// ajout du filtre de type de plat au clic
for (let i = 0 ; i<categoriePlat.length; i++) {
    let typePlat = categoriePlat[i].getAttribute("id");
    categoriePlat[i].addEventListener("click", event => {
        window.localStorage.setItem("typePlat", typePlat);
    });
}