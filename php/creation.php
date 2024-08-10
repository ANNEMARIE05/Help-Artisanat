<?php

include 'config.php';

$sql = "SELECT * FROM articles ORDER BY date_ajout DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='uploads/" . $row['image'] . "' class='card-img-top' style='height:250px;' alt='Image de l'article'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['nom'] . "</h5>";
        echo "<p class='card-text'>Prix: " . $row['prix'] . "</p>";
        echo "<p class='card-text'>Contact: " . $row['contact'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>Aucun article disponible.</p>";
}

$conn->close();
?>
