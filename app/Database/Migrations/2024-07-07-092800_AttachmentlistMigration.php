<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttachmentlistMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'attachment-list-id' => [
                'type' => 'BIGINT(20)',
                'auto_increment' => true
            ],
            'attachment-id' => [
                'type' => 'INT(5)',
                'unsigned' => true
            ],
            'docdetail-id' => [
                'type' => 'BIGINT(20)',
                'null' => true
            ],
            'docno' => [
                'type' => 'VARCHAR',
                'constraint' => '14',
                'null' => true
            ],
        ]);
        
        $this->forge->addKey('attachment-list-id',true);
        $this->forge->addForeignKey('attachment-id', 'attachments', 'attachment-id', 'CASCADE', 'CASCADE', 'fk_attachment');
        $this->forge->addForeignKey('docdetail-id', 'docdetails', 'docdetail-id', 'CASCADE', 'CASCADE', 'fk_route');
        $this->forge->addForeignKey('docno', 'documents', 'docno', 'CASCADE', 'CASCADE', 'fk_doc_no');
        $this->forge->createTable('attachment-lists');
    }

    public function down()
    {
        $this->forge->dropTable('attachment-lists');
    }
}
