<?php  

    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        // Connexion à la base de données  
        $conn = new mysqli('localhost', 'username', 'password', 'artisan_db'); // Remplacez par vos identifiants de connexion  

        if ($conn->connect_error) {  
            die("Connection failed: " . $conn->connect_error);  
        }  

        // Préparer et lier  
        $stmt = $conn->prepare("INSERT INTO artisans (nom, prenom, sexe, ville, commune, quartier, email, numero, entreprise, secteur, specialites, whatsapp, mot_de_passe, certificat, annee_existence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
        $stmt->bind_param("sssssssssssssssi", $nom, $prenom, $sexe, $ville, $commune, $quartier, $email, $numero, $entreprise, $secteur, $specialites, $whatsapp, $mot_de_passe, $certificat, $annee_existence);  

        // Collecte des données  
        $nom = $_POST['nom'];  
        $prenom = $_POST['prenom'];  
        $sexe = $_POST['sexe'];  
        $ville = $_POST['ville'];  
        $commune = $_POST['commune'];  
        $quartier = $_POST['quartier'];  
        $email = $_POST['email'];  
        $numero = $_POST['numero'];  
        $entreprise = $_POST['entreprise'];  
        $secteur = $_POST['secteur'];  
        $specialites = $_POST['specialites'];  
        $whatsapp = $_POST['whatsapp'];  
        $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT); // Hash du mot de passe  
        $certificat = $_POST['certificate'];   
        $annee_existence = $_POST['year'];  

        // Exécution de la requête  
        if ($stmt->execute()) {  
            // Redirection vers la page de connexion  
            header("Location: login.php");  
            exit();  
        } else {  
            echo "Erreur : " . $stmt->error;  
        }  

        $stmt->close();  
        $conn->close();  
    }  
        
?>