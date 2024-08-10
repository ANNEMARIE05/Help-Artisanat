<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artisans_db";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupérer les données du formulaire
if (isset($_POST['search']) && isset($_POST['city'])) {
    $search = $conn->real_escape_string($_POST['search']);
    $city = $conn->real_escape_string($_POST['city']);

    // Requête SQL pour rechercher les artisans
    $sql = "SELECT * FROM artisans WHERE profession LIKE '%$search%' AND ville LIKE '%$city%'";
    $result = $conn->query($sql);

    // Affichage des résultats
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h3>" . $row['nom'] . "</h3>";
            echo "<p>Profession: " . $row['profession'] . "</p>";
            echo "<p>Ville: " . $row['ville'] . "</p>";
            echo "<p>Contact: " . $row['contact'] . "</p>";
            echo "</div><br>";
        }
    } else {
        echo "Aucun artisan trouvé pour les critères spécifiés.";
    }
}

// Fermer la connexion
$conn->close();
?>
