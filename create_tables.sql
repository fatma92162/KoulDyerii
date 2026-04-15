USE kouldyeridb data_%kernel.environment%.db" app app app;

CREATE TABLE IF NOT EXISTS livreur (
    id_livreur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    disponibilite TINYINT(1) DEFAULT 1
);

CREATE TABLE IF NOT EXISTS livraison (
    id_livraison INT AUTO_INCREMENT PRIMARY KEY,
    adresse VARCHAR(255) DEFAULT NULL,
    statut_livraison VARCHAR(50) DEFAULT 'en_attente',
    id_commande INT DEFAULT NULL,
    id_livreur INT DEFAULT NULL
);

INSERT IGNORE INTO livreur (id_livreur, nom, prenom, telephone) VALUES 
(1, 'Ben Ali', 'Mohamed', '12345678'),
(2, 'Trabelsi', 'Ahmed', '87654321'),
(3, 'Gharbi', 'Sami', '11223344');

SELECT * FROM livreur;