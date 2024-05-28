<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données
include 'database.php';

$search_query = $_GET['search_query'] ?? '';

if (!empty($search_query)) {
    $query = "SELECT * FROM properties WHERE name LIKE CONCAT('%', ?, '%') OR address LIKE CONCAT('%', ?, '%')";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $conn->error);
    }

    $stmt->bind_param("ss", $search_query, $search_query);

    if ($stmt->execute() === false) {
        die("Erreur d'exécution de la requête : " . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result === false) {
        die("Erreur de récupération des résultats : " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['address']) . "</p>";
        }
    } else {
        echo "Aucun résultat trouvé pour '" . htmlspecialchars($search_query) . "'.";
    }

    $stmt->close();
} else {
    echo "Veuillez entrer un terme de recherche.";
}

$conn->close();
?>
