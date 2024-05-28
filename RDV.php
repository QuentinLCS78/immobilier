<?php
session_start();
include 'db.php'; // Assurez-vous que ce fichier contient vos informations de connexion à la base de données.
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous - Omnes Immobilier</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Inclusion unique de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    function annulerRDV(agent_id, date, time) {
        if (!confirm('Êtes-vous sûr de vouloir annuler ce rendez-vous ?')) return;
        
        $.ajax({
            type: 'POST',
            url: 'annuler_rdv.php',
            data: {agent_id: agent_id, date: date, time: time},
            success: function(response) {
                if(response === 'success') {
                    alert('Rendez-vous annulé avec succès.');
                    window.location.reload(); // Recharger la page pour mettre à jour l'affichage
                } else {
                    alert('Erreur lors de l\'annulation du rendez-vous.');
                }
            },
            error: function(xhr) {
                alert('Erreur technique: ' + xhr.status + ' - ' + xhr.statusText);
            }
        });
    }
    </script>
</head>
<body>
    <div id="wrapper">
        <header>
            <img src="images/logo.png" alt="Logo Omnes Immobilier" id="logo">
            <h1>Omnes Immobilier</h1>
        </header>
        <nav>    
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="parcourir.html">Tout Parcourir</a></li>
                <li><a href="recherche.html">Recherche</a></li>
                <li><a href="RDV.php">Rendez-vous</a></li>
                <li><a href="compte.html">Votre Compte</a></li>
            </ul>
        </nav>
        <section>
            <h2>Gérer vos rendez-vous</h2>
            <?php
            if (isset($_SESSION['confirmed_appointment'])) {
                $confirmed_appointment = $_SESSION['confirmed_appointment'];
                echo "<p>Rendez-vous confirmé !</p>";
                echo "<p>Agent ID: " . $confirmed_appointment['agent_id'] . "</p>";
                echo "<p>Date: " . $confirmed_appointment['date'] . "</p>";
                echo "<p>Heure: " . $confirmed_appointment['time'] . "</p>";

                // Bouton pour annuler le rendez-vous
                echo "<button onclick=\"annulerRDV('{$confirmed_appointment['agent_id']}', '{$confirmed_appointment['date']}', '{$confirmed_appointment['time']}')\" class='button'>Annuler le RDV</button>";

                // Effacer la session après affichage
                unset($_SESSION['confirmed_appointment']);
            } else {
                echo "<p>Aucun rendez-vous confirmé.</p>";
            }
            ?>
        </section>
        <footer>
            <p>© 2024 Omnes Immobilier. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
