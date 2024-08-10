<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Database connection  
    $conn = new mysqli('localhost', 'username', 'password', 'artisan_db'); // Update with your DB credentials  

    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    }  

    // Prepare and bind  
    $stmt = $conn->prepare("INSERT INTO artisans (nom, prenom, sexe, ville, commune, quartier, email, numero, entreprise, secteur, specialites, whatsapp, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
    $stmt->bind_param("sssssssssssss", $nom, $prenom, $sexe, $ville, $commune, $quartier, $email, $numero, $entreprise, $secteur, $specialites, $whatsapp, $mot_de_passe);  

    // Collect data  
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
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT); // Hash the password  

    // Execute the statement  
    if ($stmt->execute()) {  
        // Redirect to login page  
        header("Location: login.php");  
        exit();  
    } else {  
        echo "Error: " . $stmt->error;  
    }  

    $stmt->close();  
    $conn->close();  
}  
?><?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Database connection  
    $conn = new mysqli('localhost', 'username', 'password', 'artisan_db'); // Update with your DB credentials  

    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    }  

    // Prepare and bind  
    $stmt = $conn->prepare("INSERT INTO artisans (nom, prenom, sexe, ville, commune, quartier, email, numero, entreprise, secteur, specialites, whatsapp, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");  
    $stmt->bind_param("sssssssssssss", $nom, $prenom, $sexe, $ville, $commune, $quartier, $email, $numero, $entreprise, $secteur, $specialites, $whatsapp, $mot_de_passe);  

    // Collect data  
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
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT); // Hash the password  

    // Execute the statement  
    if ($stmt->execute()) {  
        // Redirect to login page  
        header("Location: login.php");  
        exit();  
    } else {  
        echo "Error: " . $stmt->error;  
    }  

    $stmt->close();  
    $conn->close();  

    
}  


?>