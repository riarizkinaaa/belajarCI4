<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Loker extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_loker'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true,
            ],
            'id_ktgr'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'constraint'=>11,
            ],
            'id_prshn'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'constraint'=>11,
            ],
            'judul_loker'=>[
                'type'=>'VARCHAR',
                'constraint'=>35,
            ],
            'posisi'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,
            ],
            'tgl_buka'=>[
                'type'=>'DATE',
            ],
            'tgl_tutup'=>[
                'type'=>'DATE',
            ],
            'syrt_pend'=>[
                'type'=>'VARCHAR',
                'constraint'=>15,
            ],
            'gaji'=>[
                'type'=>'DECIMAL',
            ],
            'detail_loker'=>[
                'type'=>'TEXT',
                'constraint'=>100,
            ],
            'created_at'=>[
                'type'=>'DATETIME'

            ],
            'updated_at'=>[
                'type'=>'DATETIME'

            ]
        ]);
        // create primary key
        $this->forge->addKey('id_loker',TRUE);
        $this->forge->addForeignKey('id_ktgr',"ktgr_loker","id_ktgr","cascade","cascade");
        $this->forge->addForeignKey('id_prshn',"perusahaan","id_prshn","cascade","cascade");

        // create table perusahaan
        $this->forge->createTable('loker');
    }

    public function down()
    {
        //delete
        $this->forge->dropTable('loker');
    }
}