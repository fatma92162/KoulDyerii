<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260419223000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add persistent quiz score to inscription_formation';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE inscription_formation ADD quiz_score INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE inscription_formation DROP quiz_score');
    }
}

