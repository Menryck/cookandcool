console.log("hello le monde");



function selectRecette (id, evenementJS, callback)
{
    var listeRecette = document.getElementById(id);
    for(var a=0; a<listeRecette.clientHeight; a++)
    {
        var recette = listeRecette[a];
        recette.addEventListener(id, evenementJS, callback);
    }
};



// AJOUTER UNE INTERACTION SUR LES BOUTONS PRECEDENT ET SUIVANT
var boutonPrecedent = document.querySelector('button.precedent');
if (boutonPrecedent != null)
{
    boutonPrecedent.addEventListener('click', function(event){
        // DEBUG
        console.log('PRECEDENT');
        // SI ON UTILISE LES INDICES 
        var indiceActuel = Array.from(listeJour).indexOf(miniActuelle);
        console.log(indiceActuel);
        var indicePrecedent = indiceActuel -1;
        // ON DOIT GERER LE CAS DU PREMIER
        // SI ON EST DEJA SUR LE PREMIER ALORS ON PASSE AU DERNIER
        if (indiceActuel == 0)
        {
            indicePrecedent = listeJour.length -1; // DERNIER INDICE
        }
        var jourPrecedent = listeJour[indicePrecedent];
        console.log(jourPrecedent);
        // on change l'image
        var imageGrand = document.querySelector('img.grand');
        imageGrand.src = jourPrecedent.src;
        // on a changé d'image actuell
        miniActuelle = jourPrecedent;
    });
}

var boutonSuivant = document.querySelector('button.suivant');
if (boutonSuivant != null)
{
    boutonSuivant.addEventListener('click', function(event){
        // DEBUG
        console.log('SUIVANT');
        // SI ON UTILISE LES INDICES 
        var indiceActuel = Array.from(listeJour).indexOf(miniActuelle);
        console.log(indiceActuel);
        var indiceSuivant = indiceActuel +1;
        // ON DOIT GERER LE CAS DU DERNIER
        // SI ON EST DEJA SUR LE PREMIER ALORS ON PASSE AU DERNIER
        if (indiceActuel == listeJour.length -1)
        {
            indiceSuivant = 0; // PREMIER INDICE
        }

        var imageSuivante = listeJour[indiceSuivant];
        console.log(imageSuivante);
        // on change l'image
        var imageGrand = document.querySelector('img.grand');
        imageGrand.src = imageSuivante.src;
        // on a changé d'image actuell
        miniActuelle = imageSuivante;
    });
}