<?php
include 'db.php'; // Assurez-vous que ce fichier contient vos informations de connexion à la base de données.

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Si un rendez-vous est confirmé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    $agent_id = $_POST['agent_id'];
    $available_date = $_POST['available_date'];
    $available_time = $_POST['available_time'];
    
    // Insérer le rendez-vous confirmé dans la table des rendez-vous
    $sql_insert = "INSERT INTO confirmed_appointments (agent_id, appointment_date, appointment_time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("iss", $agent_id, $available_date, $available_time);
    $stmt->execute();
    
    // Stocker les informations du rendez-vous dans la session
    $_SESSION['confirmed_appointment'] = [
        'agent_id' => $agent_id,
        'date' => $available_date,
        'time' => $available_time
    ];

    // Rediriger vers la page des rendez-vous
    header("Location: rdv.php");
    exit();
}

// Récupérer les agents et leurs coordonnées
$sql_agents = "SELECT agent_id, agent_name, agent_email, agent_phone, agent_photo FROM agents";
$result_agents = $conn->query($sql_agents);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre Rendez-vous - Omnes Immobilier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <img src="images/logo.png" alt="Logo Omnes Immobilier" id="logo">
            <h1>Prendre Rendez-vous</h1>
        </header>
        <nav>   
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="parcourir.html">Tout Parcourir</a></li>
                <li><a href="recherche.html">Recherche</a></li>
                <li><a href="rdv.php">Rendez-vous</a></li>
                <li><a href="compte.html">Votre Compte</a></li>
            </ul>
        </nav>
        <section id="content">
            <h2>Agents Disponibles pour Rendez-Vous</h2>
            <?php
            if ($result_agents->num_rows > 0) {
                while ($agent = $result_agents->fetch_assoc()) {
                    echo "<div class='agent-card'>";
                    echo "<img src='" . $agent["agent_photo"] . "' alt='Photo de " . $agent["agent_name"] . "'>";
                    echo "<p><strong>Nom:</strong> " . $agent["agent_name"] . "</p>";
                    echo "<p><strong>Email:</strong> " . $agent["agent_email"] . "</p>";
                    echo "<p><strong>Téléphone:</strong> " . $agent["agent_phone"] . "</p>";

                    // Récupérer les disponibilités pour chaque agent
                    $agent_id = $agent["agent_id"];
                    $sql_availability = "SELECT available_date, available_time FROM availability WHERE agent_id = $agent_id";
                    $result_availability = $conn->query($sql_availability);

                    if ($result_availability->num_rows > 0) {
                        echo "<h3>Disponibilités:</h3>";
                        echo "<ul>";
                        while ($availability = $result_availability->fetch_assoc()) {
                            echo "<li>" . $availability["available_date"] . " à " . $availability["available_time"] . "</li>";
                            // Formulaire pour confirmer le rendez-vous
                            echo "<form method='POST' action='rendezvous.php'>";
                            echo "<input type='hidden' name='agent_id' value='" . $agent["agent_id"] . "'>";
                            echo "<input type='hidden' name='available_date' value='" . $availability["available_date"] . "'>";
                            echo "<input type='hidden' name='available_time' value='" . $availability["available_time"] . "'>";
                            echo "<input type='submit' name='confirm' value='Confirmer le RDV' class='button'>";
                            echo "</form>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>Aucune disponibilité pour cet agent.</p>";
                    }

                    echo "</div>";
                }
            } else {
                echo "Aucun agent trouvé.";
            }

            $conn->close();
            ?>
        </section>
        <footer>
            <p>© 2024 Omnes Immobilier. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
