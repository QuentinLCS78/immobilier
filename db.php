<?php
$servername = "localhost";  // L'adresse du serveur, typiquement localhost pour un serveur local
$username = "root";  // Votre nom d'utilisateur pour MySQL
$password = "root";  // Votre mot de passe pour MySQL
$dbname = "omnesimmobilier";  // Le nom de votre base de données
   
// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
echo "Connexion réussie";
?>
