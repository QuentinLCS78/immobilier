
// Valider les entrées ou gérer les interactions dynamiques
document.querySelector('form').addEventListener('submit', function(event) {
    // Vous pouvez ajouter des vérifications supplémentaires ici
    if (!confirm('Confirmez-vous la date et l heure du rdv ?'))
        {
        event.preventDefault();
    }
});
