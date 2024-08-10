<?php  
session_start();  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Database connection  
    $conn = new mysqli('localhost', 'username', 'password', 'artisan_db'); // Update with your DB credentials  

    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    }  

    $numero = $_POST['numero'];  
    $mot_de_passe = $_POST['mot_de_passe'];  

    // Prepare and execute  
    $stmt = $conn->prepare("SELECT mot_de_passe FROM artisans WHERE numero = ?");  
    $stmt->bind_param("s", $numero);  
    $stmt->execute();  
    $stmt->store_result();  
    $stmt->bind_result($hashed_password);  
    $stmt->fetch();  

    if ($stmt->num_rows > 0 && password_verify($mot_de_passe, $hashed_password)) {  
        // Save user information in session  
        $_SESSION['numero'] = $numero;  
        // Redirect to user's dashboard or homepage  
        header("Location: indexArtisan.html");  
        exit();  
    } else {  
        echo "Numéro de téléphone ou mot de passe incorrect.";  
    }  

    $stmt->close();  
    $conn->close();  
}  
?>