<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclure le fichier de connexion à la base de données
include 'database.php';

// Tester la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
} else {
    echo "Connexion réussie à la base de données.";
}

$conn->close();
?>
