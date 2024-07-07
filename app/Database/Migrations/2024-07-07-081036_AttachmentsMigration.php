<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttachmentsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'attachment-id' => [
                'type' => 'INT(5) ZEROFILL',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'attachment-description' => [
                'type' => 'VARCHAR(150)'
            ],
        ]);

        $this->forge->addKey('attachment-id', true);
        $this->forge->createTable('attachments');

    }

    public function down()
    {
        $this->forge->dropTable('attachments');
    }
}
