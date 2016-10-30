<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161030002519 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql('CREATE TABLE Account (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, agency INT NOT NULL, number INT NOT NULL, balance DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_B28B6F389395C3F3 (customer_id), INDEX UNIQUE_CUSTOMER_ACCOUNT (customer_id), INDEX UNIQUE_ACCOUNT (agency, number), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE AccountEntry (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, description VARCHAR(255) NOT NULL, amount DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_23679E3D9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, identity VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX UNIQUE_CUSTOMER (identity), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Account ADD CONSTRAINT FK_B28B6F389395C3F3 FOREIGN KEY (customer_id) REFERENCES Customer (id)');
        $this->addSql('ALTER TABLE AccountEntry ADD CONSTRAINT FK_23679E3D9B6B5FBA FOREIGN KEY (account_id) REFERENCES Account (id)');

        $firstNames = ['Mary', 'John', 'Phill', 'Natally', 'Bob', 'Paul', 'Mick'];
        $secondNames = ['Smith', 'Lennon', 'White', 'Black', 'Tomy', 'Stone', 'Tompson'];

        for ($i = 1; $i <= 20; $i++) {
            $this->createFakeAccount(
                $i,
                $firstNames[rand(0, 6)] . ' ' . $secondNames[rand(0, 6)],
                123456789 + $i,
                $i,
                777 + $i,
                999 + $i
            );
        }

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('ALTER TABLE AccountEntry DROP FOREIGN KEY FK_23679E3D9B6B5FBA');
        $this->addSql('ALTER TABLE Account DROP FOREIGN KEY FK_B28B6F389395C3F3');
        $this->addSql('DROP TABLE Account');
        $this->addSql('DROP TABLE AccountEntry');
        $this->addSql('DROP TABLE Customer');
    }

    /**
     * @param $customerId
     * @param $name
     * @param $identity
     * @param $accountId
     * @param $agency
     * @param $number
     */
    private function createFakeAccount(
        $customerId,
        $name,
        $identity,
        $accountId,
        $agency,
        $number
    ) {
        $createdAt = date('Y-m-d H:i:s');
        $this->addSql("INSERT INTO Customer(id, name, identity, created_at) VALUES($customerId, '$name', '$identity', '$createdAt') ");
        $this->addSql("INSERT INTO Account(id, customer_id, agency, number, balance, created_at) VALUES($accountId, $customerId, '$agency', '$number', 0, '$createdAt') ");
        $balance = 0;

        for ($i = 1; $i <= rand(3, 10); $i++) {
            $amount = rand(3.5, 1000.80);
            $balance += $amount;
            $description = "CREDIT ENTRY - $amount";
            $this->addSql("INSERT INTO AccountEntry(account_id, description, amount, created_at) VALUES($accountId, '$description', $amount, '$createdAt') ");
        }

        for ($i = 1; $i <= rand(1, 3); $i++) {
            $amount = rand(3.5, 500.80) * -1;
            $balance += $amount;
            $description = "DEBIT ENTRY - $amount";
            $this->addSql("INSERT INTO AccountEntry(account_id, description, amount, created_at) VALUES($accountId, '$description', $amount, '$createdAt') ");
        }

        $this->addSql("UPDATE Account SET balance = $balance WHERE id = $accountId");
    }
}
