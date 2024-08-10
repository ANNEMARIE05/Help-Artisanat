<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $contact = $_POST['contact'];

    // Gestion du téléchargement de l'image
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Insertion dans la base de données
        $sql = "INSERT INTO articles (nom, prix, contact, image) VALUES ('$nom', '$prix', '$contact', '$image')";

        if ($conn->query($sql) === TRUE) {
            echo "Nouvel article ajouté avec succès!";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
$conn->close();
?>
