<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DocdetailsMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'docdetails-id' => [
                'type' => 'BIGINT(20)',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'routeno' => [
                'type' => 'VARCHAR(15)'
            ],
            'docno' => [
                'type' => 'VARCHAR(14)'
            ],
            'status' => [
                'type' => 'ENUM("IN PROGRESS", "DONE")'
            ],
            'sequence' => [
                'type' => 'INT(3)',
            ],
            'action_required' => [
                'type' => 'INT(5)',
                'unsigned' => true,
            ],
            'date_required' => [
                'type' => 'DATE'
            ],
            'time_required' => [
                'type' => 'TIME'
            ],
            'date_released' => [
                'type' => 'DATE'
            ],
            'time_released' => [
                'type' => 'TIME'
            ],
            'action_taken' => [
                'type' => 'INT',
                'constraint' => '8',
                'unsigned' => true,
                'null' => true
            ],
            'source' => [
                'type' => 'INT',
                'constraint' => '8',
                'unsigned' => true
            ],
            'destination' => [
                'type' => 'INT',
                'constraint' => '8',
                'unsigned' => true
            ],
        ]);

        $this->forge->addKey('docdetails_id',true);
        $this->forge->addForeignKey('docno','documents','docno','CASCADE','CASCADE','fk_docno');
        $this->forge->addForeignKey('action_required','actions','action_id','CASCADE','CASCADE','fk_action_req');
        $this->forge->addForeignKey('action_taken','actions','action_id','CASCADE','CASCADE','fk_action_taken');
        $this->forge->addForeignKey('source','offices','office_id','CASCADE','CASCADE','fk_source');
        $this->forge->addForeignKey('destination','offices','office_id','CASCADE','CASCADE','fk_destination');
        $this->forge->createTable('docdetails');

        $this->db->query("
            CREATE TRIGGER `routeno_counter` BEFORE INSERT ON `docdetails`
            FOR EACH ROW BEGIN
                DECLARE current_num integer;

                SELECT COALESCE(MAX(convert(substring(routeno, 7, 15), signed)),0) into current_num from docdetails;

                if current_num = null then
                    set current_num = 0;
                end if;

                set current_num = current_num + 1;

                set new.routeno = concat('R', year(current_date), '-', lpad(current_num, 9, '0'));
            END
        ");
    }

    public function down()
    {
        $this->forge->dropTable('docdetails');
    }
}
