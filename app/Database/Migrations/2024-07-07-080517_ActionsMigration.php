<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ActionsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'action-id' => [
                'type' => 'INT(5) ZEROFILL',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'action-description' => [
                'type' => 'VARCHAR(100)',
            ],
        ]);

        $this->forge->addKey('action-id', true);
        $this->forge->createTable('actions');

    }

    public function down()
    {
        $this->forge->dropTable('actions');
    }
}
