<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserlevelsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'userlevel-id' => [
                'type' => 'INT(5) ZEROFILL',
                'unsigned' => true,
                'auto_increment' => true 
            ],
            'userlevel-description' => [
                'type' => 'VARCHAR(150)'
            ],
        ]);

        $this->forge->addKey('userlevel-id', true);
        $this->forge->createTable('userlevels');

    }

    public function down()
    {
        $this->forge->dropTable('userlevels');
    }
}
