<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181216011943 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produtos DROP FOREIGN KEY FK_3E52435F18F3777');
        $this->addSql('DROP INDEX IDX_3E52435F18F3777 ON produtos');
        $this->addSql('ALTER TABLE produtos DROP vendas_id');
        $this->addSql('ALTER TABLE vendas ADD produtos_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendas ADD CONSTRAINT FK_1CA62EEE65691519 FOREIGN KEY (produtos_id) REFERENCES produtos (id)');
        $this->addSql('CREATE INDEX IDX_1CA62EEE65691519 ON vendas (produtos_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produtos ADD vendas_id INT NOT NULL');
        $this->addSql('ALTER TABLE produtos ADD CONSTRAINT FK_3E52435F18F3777 FOREIGN KEY (vendas_id) REFERENCES vendas (id)');
        $this->addSql('CREATE INDEX IDX_3E52435F18F3777 ON produtos (vendas_id)');
        $this->addSql('ALTER TABLE vendas DROP FOREIGN KEY FK_1CA62EEE65691519');
        $this->addSql('DROP INDEX IDX_1CA62EEE65691519 ON vendas');
        $this->addSql('ALTER TABLE vendas DROP produtos_id');
    }
}
