<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AudittrailsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'audit-trail-id' => [
                'type' => 'BIGINT(20)',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'userid' => [
                'type' => 'INT(8)',
                'unsigned' => true
            ],
            'event' => [
                'type' => 'ENUM("insert", "update", "delete")',
            ],
            'table_name' => [
                'type' => 'VARCHAR(100)'
            ],
            'old_values' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'new_values' => [
                'type' => 'TEXT'
            ],
            'url' => [
                'type' => 'VARCHAR(255)',
            ],
            'created_at timestamp default current_timestamp'
        ]);

        $this->forge->addKey('audit-trail-id', true);
        $this->forge->createTable('audit-trails');

    }

    public function down()
    {
        $this->forge->dropTable('audit-trails');
    }
}
