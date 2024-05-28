<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche - Omnes Immobilier</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>   
    <div id="wrapper">
        <header>
            <img src="images/logo.png" alt="Logo Omnes Immobilier" id="logo">
            <h1>Omnes Immobilier</h1>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="parcourir.php">Tout Parcourir</a></li>
                <li><a href="recherche.php">Recherche</a></li>
                <li><a href="rdv.php">Rendez-vous</a></li>
                <li><a href="compte.php">Votre Compte</a></li>
            </ul>
        </nav>
        <section>
            <h2>Recherche de propriétés</h2>
            <form action="recherche.php" method="post">
                <input type="text" name="keyword" placeholder="Entrer un mot-clé..." class="form-control">
                <button type="submit" class="button">Rechercher</button>
            </form>
            <div id="searchResults" class="property-card">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $keyword = htmlspecialchars($_POST['keyword']);  // Sanitize input
                    echo "<p>Résultats de la recherche pour '$keyword':</p>";
                    // Simulate a search result
                    echo "<p>Information sur la propriété ou l'agent contenant '$keyword'</p>";
                }
                ?>
            </div>
        </section>
        <footer>
            <p>© 2024 Omnes Immobilier. Tous droits réservés.</p>
        </footer>
    </div>
</body>
</html>
