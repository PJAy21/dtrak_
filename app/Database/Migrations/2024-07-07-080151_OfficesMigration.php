<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OfficesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'office-id' => [
                'type' => 'INT(5) ZEROFILL',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'office-name' => [
                'type' => 'VARCHAR(200)'
            ],
            'head-of-office' => [
                'type' => 'VARCHAR(200)'
            ],
        ]);

        $this->forge->addKey('office-id', true);
        $this->forge->createTable('offices');

    }

    public function down()
    {
        $this->forge->dropTable('offices');
    }
}
