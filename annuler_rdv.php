<?php
include 'db.php'; // Connexion à la base de données

// Assurez-vous que les données POST sont présentes avant de continuer
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agent_id']) && isset($_POST['date']) && isset($_POST['time'])) {
    $agent_id = $_POST['agent_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Préparer et exécuter la requête pour supprimer le rendez-vous
    $sql_delete = "DELETE FROM confirmed_appointments WHERE agent_id = ? AND appointment_date = ? AND appointment_time = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("iss", $agent_id, $date, $time);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'success'; // Renvoyer 'success' si la suppression est réussie
    } else {
        echo 'error'; // Renvoyer 'error' si aucun enregistrement n'est supprimé
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'error'; // Renvoyer 'error' si les données nécessaires ne sont pas fournies
}
?>  
