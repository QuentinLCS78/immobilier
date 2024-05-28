<?php
include 'db.php';  // Inclure le script de connexion

$sql = "SELECT agent_id, agent_name, agent_email FROM agents";
$result = $conn->query($sql);
   
if ($result->num_rows > 0) {
    // Afficher les données de chaque ligne
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["agent_id"]. " - Nom: " . $row["agent_name"]. " " . $row["agent_email"]. "<br>";
    }
} else {
    echo "0 résultats";
}
$conn->close();
?>
