<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Agents</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1>Agents de Omnes Immobilier</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="parcourir.html">Tout Parcourir</a></li>
                <li><a href="recherche.html">Recherche</a></li>
                <li><a href="rdv.html">Rendez-vous</a></li>
                <li><a href="compte.html">Votre Compte</a></li>
            </ul>
        </nav>
        <main>
            <h2>Nos Agents</h2>
            <?php
            include 'database.php'; // Assurez-vous que le chemin vers le fichier est correct

            $sql = "SELECT * FROM agents";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Nom: " . htmlspecialchars($row["name"]) . "</p>";
                }
            } else {
                echo "<p>0 résultats</p>";
            }
            $conn->close();
            ?>
        </main>
        <footer>
            <p>© 2024 Omnes Immobilier. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
