<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'user_image' => [
                'type' => 'VARCHAR',
                'constraint' => 70,
                'default' => 'default.png'
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'instansi', 'pencaker']
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);
        // create primary key
        $this->forge->addKey('user_id', TRUE);

        // create table perusahaan
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
