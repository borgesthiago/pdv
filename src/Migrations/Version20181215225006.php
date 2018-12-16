<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181215225006 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE funcionario (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, endereco VARCHAR(255) DEFAULT NULL, telefone VARCHAR(20) DEFAULT NULL, celular VARCHAR(20) DEFAULT NULL, cpf VARCHAR(11) DEFAULT NULL, salario DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD funcionario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649642FEB76 FOREIGN KEY (funcionario_id) REFERENCES funcionario (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649642FEB76 ON user (funcionario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649642FEB76');
        $this->addSql('DROP TABLE funcionario');
        $this->addSql('DROP INDEX UNIQ_8D93D649642FEB76 ON user');
        $this->addSql('ALTER TABLE user DROP funcionario_id');
    }
}
