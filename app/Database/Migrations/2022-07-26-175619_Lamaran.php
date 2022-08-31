<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class Lamaran extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_lamaran'=>[
                'type'=>'INT',
                'constraint'=>11,
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'id_pencaker'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'constraint'=>11,                
            ],
            'id_loker'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'constraint'=>11,
            ],
            'berkas'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,

            ],
            'tgl_lamar'=>[
                'type'=>'DATE',
            ],
            'created_at'=>[
                'type'=>'DATETIME',
            ],
            'updated_at'=>[
                'type'=>'DATETIME',
            ]
        ]);
        // create primary key
        $this->forge->addKey('id_lamaran',true);
        $this->forge->addForeignKey('id_pencaker','pencaker','id_pencaker','cascade','cascade');
        $this->forge->addForeignKey('id_loker','loker','id_loker','cascade','cascade');

        // create table perusahaan
        $this->forge->createTable('lamaran');
    }

    public function down()
    {
        //
        $this->forge->dropTable('lamaran');
    }
}
