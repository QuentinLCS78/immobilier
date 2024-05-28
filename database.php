<?php
// Paramètres de connexion à la base de données
$host = "localhost"; // Généralement localhost si vous êtes en local
$username = "root"; // Le nom d'utilisateur pour se connecter à la base de données, souvent 'root' en local
$password = "root"; // Le mot de passe pour se connecter à la base de données, souvent vide en local
$database = "omnes_immobilier"; // Le nom de la base de données que vous avez créée

// Création de la connexion
$conn = new mysqli($host, $username, $password, $database);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
