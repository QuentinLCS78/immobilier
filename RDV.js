document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const agentSelect = document.querySelector('#agent_id');
    const dateInput = document.querySelector('#date');
    const timeInput = document.querySelector('#time');

    form.addEventListener('submit', function(event) {
        // Vérifiez si un agent est sélectionné
        if (agentSelect.value === '') {
            alert('Veuillez choisir un agent.');
            event.preventDefault();
            return;
        }

        // Vérifiez si une date est sélectionnée
        if (dateInput.value === '') {
            alert('Veuillez choisir une date.');
            event.preventDefault();
            return;
        }

        // Vérifiez si une heure est sélectionnée
        if (timeInput.value === '') {
            alert('Veuillez choisir une heure.');
            event.preventDefault();
            return;
        }

        // Demander confirmation à l'utilisateur
        if (!confirm('Confirmez-vous la date et l\'heure du rendez-vous ?')) {
            event.preventDefault();
        }
    });
});
