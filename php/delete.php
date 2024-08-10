<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Hidden input with the article's ID

    $sql = "DELETE FROM articles WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Article supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'article: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
