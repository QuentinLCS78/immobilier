
<?php
include 'database.php'; // Inclure les détails de connexion à la base de données

// Récupérer les données du formulaire
$agent_id = $_POST['agent_id'];
$date = $_POST['date'];
$time = $_POST['time'];

// Vérifier que toutes les données sont présentes
if (!empty($agent_id) && !empty($date) && !empty($time)) {
    // Préparer et exécuter la requête d'insertion
    $query = "INSERT INTO appointments (agent_id, date, time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param("iss", $agent_id, $date, $time);

    if ($stmt->execute()) {
        echo "Rendez-vous enregistré avec succès!";
    } else {
        echo "Erreur lors de l'enregistrement du rendez-vous : " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}

$conn->close();
?>
