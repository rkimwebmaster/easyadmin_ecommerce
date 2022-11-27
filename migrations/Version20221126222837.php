<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221126222837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_achat ADD achat_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_achat ADD CONSTRAINT FK_25056E66FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id)');
        $this->addSql('CREATE INDEX IDX_25056E66FE95D117 ON ligne_achat (achat_id)');
        $this->addSql('ALTER TABLE produit ADD photo_principale VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ligne_achat DROP FOREIGN KEY FK_25056E66FE95D117');
        $this->addSql('DROP INDEX IDX_25056E66FE95D117 ON ligne_achat');
        $this->addSql('ALTER TABLE ligne_achat DROP achat_id');
        $this->addSql('ALTER TABLE produit DROP photo_principale');
    }
}
