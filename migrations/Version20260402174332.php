<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260402174332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY `notification_ibfk_1`');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY `notification_ibfk_2`');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY `notification_ibfk_3`');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY `notification_ibfk_4`');
        $this->addSql('ALTER TABLE password_reset_tokens ADD CONSTRAINT FK_3967A216E7927C74 FOREIGN KEY (email) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('DROP INDEX email ON password_reset_tokens');
        $this->addSql('CREATE INDEX IDX_3967A216E7927C74 ON password_reset_tokens (email)');
        $this->addSql('ALTER TABLE pointfidelite DROP INDEX idUtilisateur, ADD INDEX IDX_2CDE43925D419CCB (idUtilisateur)');
        $this->addSql('ALTER TABLE pointfidelite DROP FOREIGN KEY `pointfidelite_ibfk_1`');
        $this->addSql('ALTER TABLE pointfidelite CHANGE solde solde INT NOT NULL');
        $this->addSql('ALTER TABLE pointfidelite ADD CONSTRAINT FK_2CDE43925D419CCB FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pointssolde DROP FOREIGN KEY `pointssolde_ibfk_1`');
        $this->addSql('ALTER TABLE pointssolde ADD date_creation DATETIME NOT NULL, ADD date_modification DATETIME NOT NULL, DROP dateCreation, DROP dateModification, CHANGE solde solde INT NOT NULL, CHANGE idUtilisateur idUtilisateur INT DEFAULT NULL');
        $this->addSql('DROP INDEX idx_utilisateur ON pointssolde');
        $this->addSql('CREATE INDEX IDX_B5CAC6B95D419CCB ON pointssolde (idUtilisateur)');
        $this->addSql('ALTER TABLE pointssolde ADD CONSTRAINT `pointssolde_ibfk_1` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE portefeuille DROP FOREIGN KEY `portefeuille_ibfk_1`');
        $this->addSql('ALTER TABLE portefeuille CHANGE solde solde DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE portefeuille ADD CONSTRAINT FK_2955FFFE5D419CCB FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY `post_ibfk_1`');
        $this->addSql('ALTER TABLE post CHANGE user_id user_id INT DEFAULT NULL, CHANGE content content LONGTEXT NOT NULL, CHANGE image_path image_path VARCHAR(500) NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX user_id ON post');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DA76ED395 ON post (user_id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('DROP INDEX unique_user_post_reaction ON post_reaction');
        $this->addSql('ALTER TABLE post_reaction DROP FOREIGN KEY `post_reaction_ibfk_2`');
        $this->addSql('ALTER TABLE post_reaction CHANGE post_id post_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX user_id ON post_reaction');
        $this->addSql('CREATE INDEX IDX_1B3A8E56A76ED395 ON post_reaction (user_id)');
        $this->addSql('ALTER TABLE post_reaction ADD CONSTRAINT `post_reaction_ibfk_2` FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_post_created ON posts');
        $this->addSql('ALTER TABLE posts CHANGE content content LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY `produit_ibfk_1`');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY `produit_ibfk_1`');
        $this->addSql('ALTER TABLE produit CHANGE description description LONGTEXT NOT NULL, CHANGE disponible disponible TINYINT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BC74A3A8 FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('DROP INDEX idvendeuse ON produit');
        $this->addSql('CREATE INDEX IDX_29A5EC27BC74A3A8 ON produit (idVendeuse)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('DROP INDEX unique_user_comment_reaction ON reaction');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY `reaction_ibfk_2`');
        $this->addSql('ALTER TABLE reaction CHANGE commentaire_id commentaire_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX user_id ON reaction');
        $this->addSql('CREATE INDEX IDX_A4D707F7A76ED395 ON reaction (user_id)');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('DROP INDEX email ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD date_naissance DATE NOT NULL, DROP dateNaissance, CHANGE region region VARCHAR(50) NOT NULL, CHANGE photo photo VARCHAR(255) NOT NULL, CHANGE empreinte empreinte LONGTEXT NOT NULL, CHANGE motDePasse mot_de_passe VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (from_user_id) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT `notification_ibfk_4` FOREIGN KEY (commentaire_id) REFERENCES commentaire (id)');
        $this->addSql('ALTER TABLE password_reset_tokens DROP FOREIGN KEY FK_3967A216E7927C74');
        $this->addSql('ALTER TABLE password_reset_tokens DROP FOREIGN KEY FK_3967A216E7927C74');
        $this->addSql('DROP INDEX idx_3967a216e7927c74 ON password_reset_tokens');
        $this->addSql('CREATE INDEX email ON password_reset_tokens (email)');
        $this->addSql('ALTER TABLE password_reset_tokens ADD CONSTRAINT FK_3967A216E7927C74 FOREIGN KEY (email) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pointfidelite DROP INDEX IDX_2CDE43925D419CCB, ADD UNIQUE INDEX idUtilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE pointfidelite DROP FOREIGN KEY FK_2CDE43925D419CCB');
        $this->addSql('ALTER TABLE pointfidelite CHANGE solde solde INT DEFAULT 0');
        $this->addSql('ALTER TABLE pointfidelite ADD CONSTRAINT `pointfidelite_ibfk_1` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE pointssolde DROP FOREIGN KEY FK_B5CAC6B95D419CCB');
        $this->addSql('ALTER TABLE pointssolde ADD dateCreation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD dateModification DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, DROP date_creation, DROP date_modification, CHANGE solde solde INT DEFAULT 0 NOT NULL, CHANGE idUtilisateur idUtilisateur INT NOT NULL');
        $this->addSql('DROP INDEX idx_b5cac6b95d419ccb ON pointssolde');
        $this->addSql('CREATE INDEX idx_utilisateur ON pointssolde (idUtilisateur)');
        $this->addSql('ALTER TABLE pointssolde ADD CONSTRAINT FK_B5CAC6B95D419CCB FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE portefeuille DROP FOREIGN KEY FK_2955FFFE5D419CCB');
        $this->addSql('ALTER TABLE portefeuille CHANGE solde solde NUMERIC(10, 3) DEFAULT \'0.000\'');
        $this->addSql('ALTER TABLE portefeuille ADD CONSTRAINT `portefeuille_ibfk_1` FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA76ED395');
        $this->addSql('ALTER TABLE post CHANGE content content TEXT NOT NULL, CHANGE image_path image_path VARCHAR(500) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_5a8a6c8da76ed395 ON post');
        $this->addSql('CREATE INDEX user_id ON post (user_id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE posts CHANGE content content TEXT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('CREATE INDEX idx_post_created ON posts (created_at)');
        $this->addSql('ALTER TABLE post_reaction DROP FOREIGN KEY FK_1B3A8E56A76ED395');
        $this->addSql('ALTER TABLE post_reaction CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE post_id post_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX unique_user_post_reaction ON post_reaction (post_id, user_id)');
        $this->addSql('DROP INDEX idx_1b3a8e56a76ed395 ON post_reaction');
        $this->addSql('CREATE INDEX user_id ON post_reaction (user_id)');
        $this->addSql('ALTER TABLE post_reaction ADD CONSTRAINT FK_1B3A8E56A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BC74A3A8');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BC74A3A8');
        $this->addSql('ALTER TABLE produit CHANGE description description TEXT DEFAULT NULL, CHANGE disponible disponible TINYINT DEFAULT 1');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur)');
        $this->addSql('DROP INDEX idx_29a5ec27bc74a3a8 ON produit');
        $this->addSql('CREATE INDEX idVendeuse ON produit (idVendeuse)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BC74A3A8 FOREIGN KEY (idVendeuse) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reaction DROP FOREIGN KEY FK_A4D707F7A76ED395');
        $this->addSql('ALTER TABLE reaction CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE commentaire_id commentaire_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX unique_user_comment_reaction ON reaction (commentaire_id, user_id)');
        $this->addSql('DROP INDEX idx_a4d707f7a76ed395 ON reaction');
        $this->addSql('CREATE INDEX user_id ON reaction (user_id)');
        $this->addSql('ALTER TABLE reaction ADD CONSTRAINT FK_A4D707F7A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (idUtilisateur) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD dateNaissance DATE DEFAULT NULL, DROP date_naissance, CHANGE region region VARCHAR(50) DEFAULT NULL, CHANGE photo photo VARCHAR(255) DEFAULT NULL, CHANGE empreinte empreinte TEXT DEFAULT NULL, CHANGE mot_de_passe motDePasse VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX email ON utilisateur (email)');
    }
}
