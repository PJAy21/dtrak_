<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DoctypesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'doctype-id' => [
                'type' => 'INT(5) ZEROFILL',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'doctype-description' => [
                'type' => 'VARCHAR(100)'
            ],
        ]);
        
        $this->forge->addKey('doctype-id',true);
        $this->forge->createTable('doctypes');

    }

    public function down()
    {
        $this->forge->dropTable('doctypes');
    }
}
