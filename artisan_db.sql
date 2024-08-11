-- Création de la base de données pour les artisans
CREATE DATABASE artisan_db;

USE artisan_db;

-- Table des artisans
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

ALTER TABLE artisans 
ADD COLUMN certificat ENUM('Oui', 'Non') NOT NULL,
ADD COLUMN annee_existence INT NOT NULL;


CREATE TABLE articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prix VARCHAR(50) NOT NULL,
    contact VARCHAR(50) NOT NULL,
    image VARCHAR(255) NOT NULL,
    date_ajout DATETIME DEFAULT CURRENT_TIMESTAMP
);

// -- Insertion de l'administrateur par défaut
INSERT INTO artisans (nom, prenom, sexe, ville, commune, quartier, email, numero, entreprise, secteur, specialites, whatsapp, mot_de_passe)
VALUES ('Administrateur', 'Super', 'Homme', '', '', '', 'admin@helpartisanat.com', '0172317983', '', '', '', '', 'azerty','', '');
