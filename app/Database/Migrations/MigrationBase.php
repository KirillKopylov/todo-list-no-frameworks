<?php


namespace App\Database\Migrations;


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;
use App\Database\Database;

/**
 * Migrations base class.
 * @package App\Database\Migrations
 */

abstract class MigrationBase extends AbstractMigration {
    public Capsule $capsule;
    public Builder $schema;
    public Database $database;

    public function init()
    {
        $this->database = new Database;
        $this->capsule = $this->database->getCapsule();
        $this->schema = $this->capsule->schema();
    }
}