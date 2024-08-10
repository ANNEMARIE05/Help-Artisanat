<?php

include 'config.php';

$sql = "SELECT * FROM articles ORDER BY date_ajout DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['prix'] . "</td>";
        echo "<td><img src='uploads/" . $row['image'] . "' style='max-width: 100px;'></td>";
        echo "<td>" . $row['date_ajout'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Aucun article trouvé.</td></tr>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Hidden input with the artisan's ID
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $sql = "UPDATE artisans SET nom=?, email=?, telephone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nom, $email, $telephone, $id);

    if ($stmt->execute()) {
        echo "Profil mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du profil: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
