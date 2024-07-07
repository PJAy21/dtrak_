<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DocumentsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'docno' => [
                'type' => 'VARCHAR(14)'
            ],
            'subject' => [
                'type' => 'VARCHAR(255)'
            ],
            'doctype' => [
                'type' => 'INT(5)',
                'unsigned' => true
            ],
            'no_of_pages' => [
                'type' => 'VARCHAR(20)',
                'null' => true
            ],
            'attached_docs_link' => [
                'type' => 'VARCHAR(255)',
                'null' => true
            ],
            'remarks' => [
                'type' => 'VARCHAR(150)',
                'null' => true
            ],
        ]);

        
        $this->forge->addKey('docno',true);
        $this->forge->addForeignKey('doctype', 'doctypes', 'doctype-id', 'CASCADE', 'CASCADE', 'fk_doctype');
        $this->forge->createTable('documents');
        
        $this->db->query("
            CREATE TRIGGER `docno_counter` BEFORE INSERT ON `documents`
            FOR EACH ROW BEGIN
                DECLARE current_num integer;

                SELECT COALESCE(MAX(convert(substring(docno, 6, 14), signed)),0) into current_num from documents;

                if current_num = null then
                    set current_num = 0;
                end if;

                set current_num = current_num + 1;

                set new.docno = concat(year(current_date), '-', lpad(current_num, 9, '0'));
            END
        ");
    }

    public function down()
    {
        $this->forge->dropTable('documents');
    }
}
