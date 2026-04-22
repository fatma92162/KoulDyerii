<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260419224000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add public token to certificate for public PDF access';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE certificate ADD public_token VARCHAR(36) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CERTIFICATE_PUBLIC_TOKEN ON certificate (public_token)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP INDEX UNIQ_CERTIFICATE_PUBLIC_TOKEN ON certificate');
        $this->addSql('ALTER TABLE certificate DROP public_token');
    }
}

