<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pencaker extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id_pencaker'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true,

            ],
            'nm_lkp'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
            ],
            'tgl_lhr'=>[
                'type'=>'DATE'
            ],
            'jk'=>[
                'type'=>'ENUM',
                'constraint'=>['laki-laki','perempuan']
            ],
            'usia'=>[
                'type'=>'INT',
                'constraint'=>2
            ],
            'alamat'=>[
                'type'=>'VARCHAR',
                'constraint'=>50,
            ],
            'email'=>[
                'type'=>'VARCHAR',
                'constraint'=>35,
            ],
            'pend_ter'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,
            ],
            'peng_ker'=>[
                'type'=>'TEXT',
            ],
            'bid_keahlian'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,
            ],
            'sertifikat'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,
            ],
            'created_at'=>[
                'type'=>'DATETIME'

            ],
            'updated_at'=>[
                'type'=>'DATETIME'

            ],
        ]);

        // create primary key
        $this->forge->addKey('id_pencaker',TRUE);

        // create table perusahaan
        $this->forge->createTable('pencaker');
    }

    public function down()
    {
        //delete table
        $this->forge->dropTable('pencaker');
    }
}
