<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserdetailsMigration extends Migration
{

    public function up()
    {
        $fields = [
            'first-name' => [
                'type' => 'VARCHAR(80)'
            ],
            'middle-name' => [
                'type' => 'VARCHAR(50)'
            ],
            'last-name' => [
                'type' => 'VARCHAR(80)'
            ],
            'office' => [
                'type' => 'INT(5)',
                'unsigned' => true
            ],
            'userlevel' => [
                'type' => 'INT(5)',
                'unsigned' => true
            ],
            'status' => [
                'type' => 'ENUM("active", "inactive")'
            ]
        ];

        $this->forge->addForeignKey('userlevel', 'userlevels', 'userlevel-id', 'CASCADE', 'CASCADE', 'fk_userlevel');
        $this->forge->addForeignKey('office', 'offices', 'office-id', 'CASCADE', 'CASCADE', 'fk_office');
        $this->forge->addColumn('users',$fields);

    }

    public function down()
    {
        
    }
}
