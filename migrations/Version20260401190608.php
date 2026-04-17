<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260401190608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY `commande_ibfk_1`');
        $this->addSql('ALTER TABLE commande MODIFY idCommande INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD id_commande INT NOT NULL, ADD date_commande DATE NOT NULL, DROP idCommande, DROP dateCommande, CHANGE statut statut VARCHAR(50) NOT NULL, CHANGE total total DOUBLE PRECISION NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_commande)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA455ACCF FOREIGN KEY (idClient) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande RENAME INDEX idclient TO IDX_6EEAA67DA455ACCF');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY `commande_produit_ibfk_1`');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY `commande_produit_ibfk_2`');
        $this->addSql('ALTER TABLE commande_produit CHANGE quantite quantite INT NOT NULL');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E873D498C26 FOREIGN KEY (idCommande) REFERENCES commande (idCommande) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E87391C87D5 FOREIGN KEY (idProduit) REFERENCES produit (idProduit) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_produit RENAME INDEX idproduit TO IDX_DF1E9E87391C87D5');
        $this->addSql('ALTER TABLE commentaire CHANGE id id INT NOT NULL, CHANGE post_id post_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL, CHANGE author author VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX post_id TO IDX_67F068BC4B89032C');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX user_id TO IDX_67F068BCA76ED395');
        $this->addSql('ALTER TABLE commentaires CHANGE id id INT NOT NULL, CHANGE post_id post_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE commentaires RENAME INDEX idx_comment_post TO IDX_D9BEC0C44B89032C');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY `favoris_ibfk_1`');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY `favoris_ibfk_2`');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432A455ACCF FOREIGN KEY (idClient) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C432391C87D5 FOREIGN KEY (idProduit) REFERENCES produit (idProduit) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favoris RENAME INDEX idproduit TO IDX_8933C432391C87D5');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY `formation_ibfk_1`');
        $this->addSql('ALTER TABLE formation MODIFY idFormation INT NOT NULL');
        $this->addSql('ALTER TABLE formation ADD id_formation INT NOT NULL, DROP idFormation, CHANGE titre titre VARCHAR(100) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_formation)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFBC74A3A8 FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE formation RENAME INDEX idvendeuse TO IDX_404021BFBC74A3A8');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY `inscription_formation_ibfk_1`');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY `inscription_formation_ibfk_2`');
        $this->addSql('ALTER TABLE inscription_formation ADD date_inscription DATE NOT NULL, DROP dateInscription');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A7A455ACCF FOREIGN KEY (idClient) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT FK_E655E3A7BCAA0AE9 FOREIGN KEY (idFormation) REFERENCES formation (idFormation) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_formation RENAME INDEX idformation TO IDX_E655E3A7BCAA0AE9');
        $this->addSql('ALTER TABLE livraison DROP INDEX idCommande, ADD INDEX IDX_A60C9F1F3D498C26 (idCommande)');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY `livraison_ibfk_1`');
        $this->addSql('ALTER TABLE livraison MODIFY idLivraison INT NOT NULL');
        $this->addSql('ALTER TABLE livraison ADD id_livraison INT NOT NULL, ADD statut_livraison VARCHAR(50) NOT NULL, DROP idLivraison, DROP statutLivraison, CHANGE adresse adresse VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_livraison)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F3D498C26 FOREIGN KEY (idCommande) REFERENCES commande (idCommande) ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_created_at ON notification');
        $this->addSql('DROP INDEX idx_user_notifications ON notification');
        $this->addSql('ALTER TABLE notification CHANGE id id INT NOT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE from_user_id from_user_id INT DEFAULT NULL, CHANGE is_read is_read TINYINT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE notification RENAME INDEX from_user_id TO IDX_BF5476CA2130303A');
        $this->addSql('ALTER TABLE notification RENAME INDEX post_id TO IDX_BF5476CA4B89032C');
        $this->addSql('ALTER TABLE notification RENAME INDEX commentaire_id TO IDX_BF5476CABA9CD190');
        $this->addSql('ALTER TABLE password_reset_tokens DROP FOREIGN KEY `password_reset_tokens_ibfk_1`');
        $this->addSql('DROP INDEX token ON password_reset_tokens');
        $this->addSql('ALTER TABLE password_reset_tokens CHANGE id id INT NOT NULL, CHANGE email email INT DEFAULT NULL, CHANGE date_expiration date_expiration DATETIME NOT NULL, CHANGE utilise utilise TINYINT NOT NULL');
        $this->addSql('ALTER TABLE password_reset_tokens ADD CONSTRAINT FK_3967A216E7927C74 FOREIGN KEY (email) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE password_reset_tokens RENAME INDEX email TO IDX_3967A216E7927C74');
        $this->addSql('ALTER TABLE pointfidelite DROP INDEX idUtilisateur, ADD INDEX IDX_2CDE43925D419CCB (idUtilisateur)');
        $this->addSql('ALTER TABLE pointfidelite DROP FOREIGN KEY `pointfidelite_ibfk_1`');
        $this->addSql('ALTER TABLE pointfidelite MODIFY idPoint INT NOT NULL');
        $this->addSql('ALTER TABLE pointfidelite ADD id_point INT NOT NULL, DROP idPoint, CHANGE solde solde INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_point)');
        $this->addSql('ALTER TABLE pointfidelite ADD CONSTRAINT FK_2CDE43925D419CCB FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pointssolde MODIFY idPoints INT NOT NULL');
        $this->addSql('ALTER TABLE pointssolde ADD id_points INT NOT NULL, ADD date_creation DATETIME NOT NULL, ADD date_modification DATETIME NOT NULL, DROP idPoints, DROP dateCreation, DROP dateModification, CHANGE solde solde INT NOT NULL, CHANGE idUtilisateur idUtilisateur INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_points)');
        $this->addSql('ALTER TABLE pointssolde RENAME INDEX idx_utilisateur TO IDX_B5CAC6B95D419CCB');
        $this->addSql('ALTER TABLE portefeuille DROP FOREIGN KEY `portefeuille_ibfk_1`');
        $this->addSql('ALTER TABLE portefeuille CHANGE solde solde DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE portefeuille ADD CONSTRAINT FK_2955FFFE5D419CCB FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post CHANGE id id INT NOT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE image_path image_path VARCHAR(500) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE post RENAME INDEX user_id TO IDX_5A8A6C8DA76ED395');
        $this->addSql('DROP INDEX unique_user_post_reaction ON post_reaction');
        $this->addSql('ALTER TABLE post_reaction CHANGE id id INT NOT NULL, CHANGE post_id post_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE post_reaction RENAME INDEX user_id TO IDX_1B3A8E56A76ED395');
        $this->addSql('DROP INDEX idx_post_created ON posts');
        $this->addSql('ALTER TABLE posts CHANGE id id INT NOT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY `produit_ibfk_1`');
        $this->addSql('ALTER TABLE produit MODIFY idProduit INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD id_produit INT NOT NULL, DROP idProduit, CHANGE description description LONGTEXT NOT NULL, CHANGE disponible disponible TINYINT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_produit)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BC74A3A8 FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit RENAME INDEX idvendeuse TO IDX_29A5EC27BC74A3A8');
        $this->addSql('DROP INDEX unique_user_comment_reaction ON reaction');
        $this->addSql('ALTER TABLE reaction CHANGE id id INT NOT NULL, CHANGE commentaire_id commentaire_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE reaction RENAME INDEX user_id TO IDX_A4D707F7A76ED395');
        $this->addSql('DROP INDEX email ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur MODIFY idUtilisateur INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD id_utilisateur INT NOT NULL, ADD date_naissance DATE NOT NULL, DROP idUtilisateur, DROP dateNaissance, CHANGE region region VARCHAR(50) NOT NULL, CHANGE photo photo VARCHAR(255) NOT NULL, CHANGE empreinte empreinte LONGTEXT NOT NULL, CHANGE motDePasse mot_de_passe VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_utilisateur)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DA455ACCF');
        $this->addSql('ALTER TABLE commande ADD idCommande INT AUTO_INCREMENT NOT NULL, ADD dateCommande DATE DEFAULT \'NULL\', DROP id_commande, DROP date_commande, CHANGE statut statut VARCHAR(50) DEFAULT \'NULL\', CHANGE total total DOUBLE PRECISION DEFAULT \'NULL\', DROP PRIMARY KEY, ADD PRIMARY KEY (idCommande)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (idClient) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE commande RENAME INDEX idx_6eeaa67da455accf TO idClient');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E873D498C26');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E87391C87D5');
        $this->addSql('ALTER TABLE commande_produit CHANGE quantite quantite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (idCommande) REFERENCES commande (idCommande)');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT `commande_produit_ibfk_2` FOREIGN KEY (idProduit) REFERENCES produit (idProduit)');
        $this->addSql('ALTER TABLE commande_produit RENAME INDEX idx_df1e9e87391c87d5 TO idProduit');
        $this->addSql('ALTER TABLE commentaire CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE author author VARCHAR(255) DEFAULT \'NULL\', CHANGE post_id post_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX idx_67f068bc4b89032c TO post_id');
        $this->addSql('ALTER TABLE commentaire RENAME INDEX idx_67f068bca76ed395 TO user_id');
        $this->addSql('ALTER TABLE commentaires CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE post_id post_id INT NOT NULL');
        $this->addSql('ALTER TABLE commentaires RENAME INDEX idx_d9bec0c44b89032c TO idx_comment_post');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432A455ACCF');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C432391C87D5');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (idClient) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (idProduit) REFERENCES produit (idProduit)');
        $this->addSql('ALTER TABLE favoris RENAME INDEX idx_8933c432391c87d5 TO idProduit');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFBC74A3A8');
        $this->addSql('ALTER TABLE formation ADD idFormation INT AUTO_INCREMENT NOT NULL, DROP id_formation, CHANGE titre titre VARCHAR(100) DEFAULT \'NULL\', CHANGE description description TEXT DEFAULT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT \'NULL\', DROP PRIMARY KEY, ADD PRIMARY KEY (idFormation)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE formation RENAME INDEX idx_404021bfbc74a3a8 TO idVendeuse');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A7A455ACCF');
        $this->addSql('ALTER TABLE inscription_formation DROP FOREIGN KEY FK_E655E3A7BCAA0AE9');
        $this->addSql('ALTER TABLE inscription_formation ADD dateInscription DATE DEFAULT \'NULL\', DROP date_inscription');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT `inscription_formation_ibfk_1` FOREIGN KEY (idClient) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE inscription_formation ADD CONSTRAINT `inscription_formation_ibfk_2` FOREIGN KEY (idFormation) REFERENCES formation (idFormation)');
        $this->addSql('ALTER TABLE inscription_formation RENAME INDEX idx_e655e3a7bcaa0ae9 TO idFormation');
        $this->addSql('ALTER TABLE livraison DROP INDEX IDX_A60C9F1F3D498C26, ADD UNIQUE INDEX idCommande (idCommande)');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F3D498C26');
        $this->addSql('ALTER TABLE livraison ADD idLivraison INT AUTO_INCREMENT NOT NULL, ADD statutLivraison VARCHAR(50) DEFAULT \'NULL\', DROP id_livraison, DROP statut_livraison, CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\', DROP PRIMARY KEY, ADD PRIMARY KEY (idLivraison)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (idCommande) REFERENCES commande (idCommande)');
        $this->addSql('ALTER TABLE notification CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE is_read is_read TINYINT DEFAULT 0, CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE from_user_id from_user_id INT NOT NULL');
        $this->addSql('CREATE INDEX idx_created_at ON notification (created_at)');
        $this->addSql('CREATE INDEX idx_user_notifications ON notification (user_id, is_read)');
        $this->addSql('ALTER TABLE notification RENAME INDEX idx_bf5476ca2130303a TO from_user_id');
        $this->addSql('ALTER TABLE notification RENAME INDEX idx_bf5476ca4b89032c TO post_id');
        $this->addSql('ALTER TABLE notification RENAME INDEX idx_bf5476caba9cd190 TO commentaire_id');
        $this->addSql('ALTER TABLE password_reset_tokens DROP FOREIGN KEY FK_3967A216E7927C74');
        $this->addSql('ALTER TABLE password_reset_tokens CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE date_expiration date_expiration DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE utilise utilise TINYINT DEFAULT 0, CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE password_reset_tokens ADD CONSTRAINT `password_reset_tokens_ibfk_1` FOREIGN KEY (email) REFERENCES utilisateur (email) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX token ON password_reset_tokens (token)');
        $this->addSql('ALTER TABLE password_reset_tokens RENAME INDEX idx_3967a216e7927c74 TO email');
        $this->addSql('ALTER TABLE pointfidelite DROP INDEX IDX_2CDE43925D419CCB, ADD UNIQUE INDEX idUtilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE pointfidelite DROP FOREIGN KEY FK_2CDE43925D419CCB');
        $this->addSql('ALTER TABLE pointfidelite ADD idPoint INT AUTO_INCREMENT NOT NULL, DROP id_point, CHANGE solde solde INT DEFAULT 0, DROP PRIMARY KEY, ADD PRIMARY KEY (idPoint)');
        $this->addSql('ALTER TABLE pointfidelite ADD CONSTRAINT `pointfidelite_ibfk_1` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE pointssolde ADD idPoints INT AUTO_INCREMENT NOT NULL, ADD dateCreation DATETIME DEFAULT \'current_timestamp()\' NOT NULL, ADD dateModification DATETIME DEFAULT \'current_timestamp()\' NOT NULL, DROP id_points, DROP date_creation, DROP date_modification, CHANGE solde solde INT DEFAULT 0 NOT NULL, CHANGE idUtilisateur idUtilisateur INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (idPoints)');
        $this->addSql('ALTER TABLE pointssolde RENAME INDEX idx_b5cac6b95d419ccb TO idx_utilisateur');
        $this->addSql('ALTER TABLE portefeuille DROP FOREIGN KEY FK_2955FFFE5D419CCB');
        $this->addSql('ALTER TABLE portefeuille CHANGE solde solde NUMERIC(10, 3) DEFAULT \'0.000\'');
        $this->addSql('ALTER TABLE portefeuille ADD CONSTRAINT `portefeuille_ibfk_1` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE post CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE image_path image_path VARCHAR(500) DEFAULT \'NULL\', CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE post RENAME INDEX idx_5a8a6c8da76ed395 TO user_id');
        $this->addSql('ALTER TABLE posts CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE content content TEXT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL');
        $this->addSql('CREATE INDEX idx_post_created ON posts (created_at)');
        $this->addSql('ALTER TABLE post_reaction CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE post_id post_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX unique_user_post_reaction ON post_reaction (post_id, user_id)');
        $this->addSql('ALTER TABLE post_reaction RENAME INDEX idx_1b3a8e56a76ed395 TO user_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BC74A3A8');
        $this->addSql('ALTER TABLE produit ADD idProduit INT AUTO_INCREMENT NOT NULL, DROP id_produit, CHANGE description description TEXT DEFAULT NULL, CHANGE disponible disponible TINYINT DEFAULT 1, DROP PRIMARY KEY, ADD PRIMARY KEY (idProduit)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE produit RENAME INDEX idx_29a5ec27bc74a3a8 TO idVendeuse');
        $this->addSql('ALTER TABLE reaction CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT \'current_timestamp()\' NOT NULL, CHANGE commentaire_id commentaire_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX unique_user_comment_reaction ON reaction (commentaire_id, user_id)');
        $this->addSql('ALTER TABLE reaction RENAME INDEX idx_a4d707f7a76ed395 TO user_id');
        $this->addSql('ALTER TABLE utilisateur ADD idUtilisateur INT AUTO_INCREMENT NOT NULL, ADD dateNaissance DATE DEFAULT \'NULL\', DROP id_utilisateur, DROP date_naissance, CHANGE region region VARCHAR(50) DEFAULT \'NULL\', CHANGE photo photo VARCHAR(255) DEFAULT \'NULL\', CHANGE empreinte empreinte TEXT DEFAULT NULL, CHANGE mot_de_passe motDePasse VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (idUtilisateur)');
        $this->addSql('CREATE UNIQUE INDEX email ON utilisateur (email)');
    }
}
