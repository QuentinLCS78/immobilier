<?php
// submit_appointment.php
include 'database.php';  // Assurez-vous d'avoir un script de connexion à la base de données

$agent_id = $_POST['agent_id'];
$date = $_POST['date'];
$time = $_POST['time'];

$query = "INSERT INTO appointments (agent_id, date, time) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iss", $agent_id, $date, $time);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Rendez-vous enregistré avec succès!";
} else {
    echo "Erreur lors de l'enregistrement du rendez-vous.";
}
$stmt->close();
$conn->close();
?>
