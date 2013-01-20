<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * FLOW3 Migration
 */
class Version20130120153547 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE pylonworks_essencebase_domain_model_project (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE pylonworks_essencebase_domain_model_testplan (persistence_object_identifier VARCHAR(40) NOT NULL, project VARCHAR(40) DEFAULT NULL, name VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_E1C412A52FB3D0EE (project), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("ALTER TABLE pylonworks_essencebase_domain_model_testplan ADD CONSTRAINT FK_E1C412A52FB3D0EE FOREIGN KEY (project) REFERENCES pylonworks_essencebase_domain_model_project (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("DROP TABLE pylonworks_essencebase_domain_model_testplan");
		$this->addSql("DROP TABLE pylonworks_essencebase_domain_model_project");
	}
}