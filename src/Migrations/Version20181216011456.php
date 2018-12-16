<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181216011456 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vendas ADD funcionario_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendas ADD CONSTRAINT FK_1CA62EEE642FEB76 FOREIGN KEY (funcionario_id) REFERENCES funcionario (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CA62EEE642FEB76 ON vendas (funcionario_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vendas DROP FOREIGN KEY FK_1CA62EEE642FEB76');
        $this->addSql('DROP INDEX UNIQ_1CA62EEE642FEB76 ON vendas');
        $this->addSql('ALTER TABLE vendas DROP funcionario_id');
    }
}
