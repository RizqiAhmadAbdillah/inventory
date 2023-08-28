<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cabang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cabang' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_cabang' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kota_cabang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_cabang', true);
        $this->forge->createTable('cabang');
    }

    public function down()
    {
        $this->forge->dropTable('cabang');
    }
}
