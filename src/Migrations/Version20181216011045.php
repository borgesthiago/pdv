<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181216011045 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recebimentos ADD vendas_id INT NOT NULL');
        $this->addSql('ALTER TABLE recebimentos ADD CONSTRAINT FK_7433C5FDF18F3777 FOREIGN KEY (vendas_id) REFERENCES vendas (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7433C5FDF18F3777 ON recebimentos (vendas_id)');
        $this->addSql('ALTER TABLE vendas DROP FOREIGN KEY FK_1CA62EEED20067DA');
        $this->addSql('DROP INDEX UNIQ_1CA62EEED20067DA ON vendas');
        $this->addSql('ALTER TABLE vendas DROP recebimentos_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recebimentos DROP FOREIGN KEY FK_7433C5FDF18F3777');
        $this->addSql('DROP INDEX UNIQ_7433C5FDF18F3777 ON recebimentos');
        $this->addSql('ALTER TABLE recebimentos DROP vendas_id');
        $this->addSql('ALTER TABLE vendas ADD recebimentos_id INT NOT NULL');
        $this->addSql('ALTER TABLE vendas ADD CONSTRAINT FK_1CA62EEED20067DA FOREIGN KEY (recebimentos_id) REFERENCES recebimentos (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1CA62EEED20067DA ON vendas (recebimentos_id)');
    }
}
