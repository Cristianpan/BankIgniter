<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cuentas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'constraint' => 16,
                'auto_increment' => true,
            ],
            'clienteId' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'saldo' => [
                'type' => 'DECIMAL(10,2)', 
            ], 
            'vencimiento' => [
                'type' => 'VARCHAR(5)'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('clienteId', 'clientes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cuentas');
    }

    public function down()
    {
        $this->forge->dropTable('cuentas');
    }
}
