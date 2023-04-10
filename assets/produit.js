        // transformer les select en select2. On deplacera ce script ailleurs si on utilise Webpack o assets
        $(document).ready(function() {
            $('.select2').select2(); 
        });

// Récupération des étoiles
const stars = document.querySelectorAll('.star');

// Ajout des événements
stars.forEach(star => {
    
    star.addEventListener('click', activeSelect);
});



// Fonction pour activer les étoiles au clic et mettre à jour la note
function activeSelect(e) {
    // Récupération de la note
    const note = e.target.dataset.note;
    
    // Mise à jour du champ caché "note"
    const noteField = document.querySelector('#commentaire_note');
    noteField.value = note;
    
    // Affichage de la note sélectionnée
    const noteSelected = document.querySelector('#note-selected');
    noteSelected.innerHTML = `Note : ${note} étoile(s)`;
  
    // Désactivation des événements au survol et au clic
    stars.forEach(star => {
        star.removeEventListener('mouseover', selectStars);
        star.removeEventListener('mouseleave', unselectStars);
        star.removeEventListener('click', activeSelect);
    });
}

// Fonction pour récupérer les étoiles précédentes d'un élément HTML
function priviousSiblings(data) {
    let values = [data];
    while (data.previousSibling) {
        data = data.previousSibling;
        if (data.nodeName === 'I') {
            values.push(data);
        }
    }
    return values.reverse();
}




