<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221122060603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2729C1004E');
        $this->addSql('DROP INDEX UNIQ_29A5EC2729C1004E ON produit');
        $this->addSql('ALTER TABLE produit ADD url_video_youtube VARCHAR(255) DEFAULT NULL, DROP video_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD video_id INT DEFAULT NULL, DROP url_video_youtube');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2729C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC2729C1004E ON produit (video_id)');
    }
}
