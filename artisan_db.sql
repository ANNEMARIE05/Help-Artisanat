CREATE DATABASE artisan_db;  

USE artisan_db;  

CREATE TABLE artisans (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nom VARCHAR(50) NOT NULL,  
    prenom VARCHAR(50) NOT NULL,  
    sexe ENUM('Femme', 'Homme') NOT NULL,  
    ville VARCHAR(50),  
    commune VARCHAR(50),  
    quartier VARCHAR(50),  
    email VARCHAR(100) UNIQUE NOT NULL,  
    numero VARCHAR(15) UNIQUE NOT NULL,  
    entreprise VARCHAR(100),  
    secteur VARCHAR(100),  
    specialites VARCHAR(255),  
    whatsapp VARCHAR(15),  
    mot_de_passe VARCHAR(255) NOT NULL  
);

CREATE DATABASE helpartisanat;

USE helpartisanat;

CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
);
