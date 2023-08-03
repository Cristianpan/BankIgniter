<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Clientes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'apellido' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'curp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'fechaNacimiento' => [
                'type' => 'DATE',
            ],
            'edad' => [
                'type' => 'INT',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
