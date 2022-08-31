<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class KtgrLoker extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_ktgr'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>TRUE,
                'auto_increment'=>TRUE
            ],
            'nm_ktgr'=>[
                'type'=>'VARCHAR',
                'constraint'=>25
            ],
            'created_at'=>[
                'type'=>'DATETIME'
            ],
            'updated_at'=>[
                'type'=>'DATETIME'
            ]
        ]);
        // create primary key
        $this->forge->addKey('id_ktgr',TRUE);

        // create table perusahaan
        $this->forge->createTable('ktgr_loker');
    }

    public function down()
    {
        //
        $this->forge->dropTable('ktgr_loker');
    }
}
