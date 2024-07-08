<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704125227 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, price VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_35D4282CF77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercants (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercants_articles (commercants_id INT NOT NULL, articles_id INT NOT NULL, INDEX IDX_F9B98BD06121959C (commercants_id), INDEX IDX_F9B98BD01EBAF6CC (articles_id), PRIMARY KEY(commercants_id, articles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE factures (id INT AUTO_INCREMENT NOT NULL, panier_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_647590BF77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteurs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visiteurs_articles (visiteurs_id INT NOT NULL, articles_id INT NOT NULL, INDEX IDX_E06C77CCBF668307 (visiteurs_id), INDEX IDX_E06C77CC1EBAF6CC (articles_id), PRIMARY KEY(visiteurs_id, articles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CF77D927C FOREIGN KEY (panier_id) REFERENCES visiteurs (id)');
        $this->addSql('ALTER TABLE commercants_articles ADD CONSTRAINT FK_F9B98BD06121959C FOREIGN KEY (commercants_id) REFERENCES commercants (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commercants_articles ADD CONSTRAINT FK_F9B98BD01EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE factures ADD CONSTRAINT FK_647590BF77D927C FOREIGN KEY (panier_id) REFERENCES commandes (id)');
        $this->addSql('ALTER TABLE visiteurs_articles ADD CONSTRAINT FK_E06C77CCBF668307 FOREIGN KEY (visiteurs_id) REFERENCES visiteurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE visiteurs_articles ADD CONSTRAINT FK_E06C77CC1EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CF77D927C');
        $this->addSql('ALTER TABLE commercants_articles DROP FOREIGN KEY FK_F9B98BD06121959C');
        $this->addSql('ALTER TABLE commercants_articles DROP FOREIGN KEY FK_F9B98BD01EBAF6CC');
        $this->addSql('ALTER TABLE factures DROP FOREIGN KEY FK_647590BF77D927C');
        $this->addSql('ALTER TABLE visiteurs_articles DROP FOREIGN KEY FK_E06C77CCBF668307');
        $this->addSql('ALTER TABLE visiteurs_articles DROP FOREIGN KEY FK_E06C77CC1EBAF6CC');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE commercants');
        $this->addSql('DROP TABLE commercants_articles');
        $this->addSql('DROP TABLE factures');
        $this->addSql('DROP TABLE visiteurs');
        $this->addSql('DROP TABLE visiteurs_articles');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
